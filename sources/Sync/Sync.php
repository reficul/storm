<?php

/**
 * @brief       Sync Singleton
 * @author      -storm_author-
 * @copyright   -storm_copyright-
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       -storm_since_version-
 * @version     -storm_version-
 */

namespace IPS\storm;

if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] :
            'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Sync extends \IPS\Patterns\Singleton
{

    /**
     * @brief   Singleton Instances
     * @note    This needs to be declared in any child classes as well, only declaring here for editor code-complete/error-check functionality
     */
    protected static $instance = null;

    public function recieve(){
        $conf = \IPS\Settings::i();
        $keyHash = sha1($conf->getFromConfGlobal('base_url').$conf->getFromConfGlobal('board_start'));

        $key = \IPS\Request::i()->key;
        $app = \IPS\Request::i()->app;

        if( $key === $keyHash ){
            $app = \IPS\Application::load( $app );
            $ftp = $conf->storm_ftp_path;
            $path = $ftp.'/'.$app->directory.'.tar';
            if( file_exists( $path ) )
            {
                /* Test the phar */
                $application = new \PharData( $path, 0, null, \Phar::TAR );

                /* Get app directory */
                $appdata = json_decode( file_get_contents( "phar://" . $path . '/data/application.json' ), true );
                $appDirectory = $appdata[ 'app_directory' ];

                /* Extract */
                $application->extractTo( \IPS\ROOT_PATH . "/applications/" . $appDirectory, null, true );
                $this->_checkChmod( \IPS\ROOT_PATH . '/applications/' . $appDirectory );
            }
        }
    }

    protected function _checkChmod( $directory )
    {
        if ( !is_dir( $directory ) )
        {
            throw new \UnexpectedValueException;
        }

        $it = new \RecursiveDirectoryIterator( $directory, \FilesystemIterator::SKIP_DOTS );
        foreach( new \RecursiveIteratorIterator( $it ) AS $f )
        {
            if ( $f->isDir() )
            {
                @chmod( $f->getPathname(), \IPS\IPS_FOLDER_PERMISSION );
            }
            else
            {
                @chmod( $f->getPathname(), \IPS\IPS_FILE_PERMISSION );
            }
        }
    }

    public function send(){
        $s = \IPS\Settings::i();
        $sites = json_decode( $s->storm_ftp_details);

        $trigger = [];
        foreach( $sites as $site )
        {
            $trigger[ $site->storm_ftp_key ] = $site->storm_ftp_interface_host;

            if( $site->storm_ftp_ssh ){
                $ftp = new \IPS\Ftp\Sftp(
                    $site->storm_ftp_host,
                    $site->storm_ftp_username,
                    $site->storm_ftp_pass,
                    $site->storm_ftp_port?:22
                );
            }
            else
            {
                $ftp = new \IPS\Ftp(
                    $site->storm_ftp_host,
                    $site->storm_ftp_username,
                    $site->storm_ftp_pass,
                    $site->storm_ftp_port ?: 21,
                    $site->storm_ftp_secure,
                    $site->storm_ftp_timeout
                );
            }

            $application = \IPS\Application::load( $site->storm_ftp_app );

            try
            {
                $application->build();
            }
            catch ( \Exception $e ){
                \IPS\Log::debug( $e );
                throw $e;
            }

            try
            {
                $pharPath	= str_replace( '\\', '/', rtrim( \IPS\TEMP_DIRECTORY, '/' ) ) . '/' . $application->directory . ".tar";
                $download	= new \PharData( $pharPath, 0, $application->directory . ".tar", \Phar::TAR );

                $download->buildFromIterator( new \IPS\Application\BuilderIterator( $application ) );
            }
            catch( \PharException $e )
            {
                \IPS\Log::debug( $e );
                throw $e;
            }

            $file	=  rtrim( \IPS\TEMP_DIRECTORY, '/' ) . '/' . $application->directory . ".tar";
            $ftp->upload( $application->directory . ".tar", $file );

            /* Cleanup */
            unset($download);
            \Phar::unlinkArchive($pharPath);
        }
    }
}
