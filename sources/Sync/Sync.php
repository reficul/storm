<?php

/**
 * @brief       Sync Singleton
 * @author      <a href='http://codingjungle.com'>Michael Edwards</a>
 * @copyright   (c) 2017 Michael Edwards
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       -storm_since_version-
 * @version     3.0.4
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
     * @note    This needs to be declared in any child classes as well, only declaring here for editor code-complete/error-check functionality test test test
     */
    protected static $instance = null;

    public function recieve()
    {
        $conf = \IPS\Settings::i();
        $keyHash = sha1( $conf->getFromConfGlobal( 'base_url' ) . $conf->getFromConfGlobal( 'board_start' ) );

        $key = \IPS\Request::i()->key;
        $app = \IPS\Request::i()->app;

        if( $key === $keyHash )
        {
            $app = \IPS\Application::load( $app );
            $ftp = $conf->storm_ftp_path;
            $path = $ftp . '/' . $app->directory . '.tar';
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
                unset( $appdata[ 'app_directory' ], $appdata[ 'app_protected' ], $appdata[ 'application_title' ] );

                foreach( $appdata as $column => $value )
                {
                    $column = preg_replace( "/^app_/", "", $column );
                    $app->$column = $value;
                }

                $app->save();

                /* Determine our current version and the last version we ran */
                $currentVersion = $app->long_version;
                $allVersions = $app->getAllVersions();
                $longVersions = array_keys( $allVersions );
                $humanVersions = array_values( $allVersions );
                $lastRan = $currentVersion;

                if( count( $allVersions ) )
                {
                    $latestLVersion = array_pop( $longVersions );
                    $latestHVersion = array_pop( $humanVersions );

                    \IPS\Db::i()->insert( 'core_upgrade_history', array(
                        'upgrade_version_human' => $latestHVersion,
                        'upgrade_version_id' => $latestLVersion,
                        'upgrade_date' => time(),
                        'upgrade_mid' => (int)\IPS\Member::loggedIn()->member_id,
                        'upgrade_app' => $app->directory
                    ) );
                }

                /* Now find any upgrade paths since the last one we ran that need to be executed */
                $upgradeSteps = $app->getUpgradeSteps( $lastRan );

                /* Did we find any? */
                if( count( $upgradeSteps ) )
                {
                    $_next = array_shift( $upgradeSteps );
                    $app->installDatabaseUpdates( $_next );
                    foreach( $upgradeSteps as $up )
                    {
                        /* Get the object */
                        $_className = "\\IPS\\{$$app->directory}\\setup\\upg_{$up}\\Upgrade";
                        $_methodName = "step1";

                        if( class_exists( $_className ) )
                        {
                            $upgrader = new $_className;

                            /* If the next step exists, run it */
                            if( method_exists( $upgrader, $_methodName ) )
                            {
                                $result = $upgrader->$_methodName();
                                /* If the result is 'true' we move on to the next step, otherwise we need to run the same step again and store the data returned */
                                if( $result === true )
                                {
                                    $ranges = range( 2, 1000 );
                                    foreach( $ranges as $range )
                                    {
                                        $next = 'step' . $range;
                                        if( method_exists( $upgrader, $next ) )
                                        {
                                            $result = $upgrader->{$next}();

                                            if( $result !== true )
                                            {
                                                break;
                                            }
                                        }
                                    }

                                }
                            }
                        }
                    }
                }
                $app->installJsonData();
                $app->installLanguages();
                $app->installEmailTemplates();
                $app->installSkins( true );
                $app->installJavascript();
                \IPS\IPS::resyncIPSCloud();
            }
        }
    }

    protected function _checkChmod( $directory )
    {
        if( !is_dir( $directory ) )
        {
            throw new \UnexpectedValueException;
        }

        $it = new \RecursiveDirectoryIterator( $directory, \FilesystemIterator::SKIP_DOTS );
        foreach( new \RecursiveIteratorIterator( $it ) AS $f )
        {
            if( $f->isDir() )
            {
                @chmod( $f->getPathname(), \IPS\IPS_FOLDER_PERMISSION );
            }
            else
            {
                @chmod( $f->getPathname(), \IPS\IPS_FILE_PERMISSION );
            }
        }
    }

    public function send()
    {
        $s = \IPS\Settings::i();
        $sites = json_decode( $s->storm_ftp_details );

        if( $sites )
        {
            $trigger = [];
            foreach( $sites as $site )
            {
                $trigger[ ] = [
                    'key' => $site->storm_ftp_key,
                    'app' => $site->storm_ftp_app,
                    'url' => $site->storm_ftp_interface_host
                ];

                if( $site->storm_ftp_ssh )
                {
                    $ftp = new \IPS\Ftp\Sftp(
                        $site->storm_ftp_host,
                        $site->storm_ftp_username,
                        $site->storm_ftp_pass,
                        $site->storm_ftp_port ?: 22
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
                $long = $application->long_version;
                $human = $application->version;
                $long++;
                $human++;
                $application->assignNewVersion( $long, $human );

                try
                {
                    $application->build();
                }
                catch( \Exception $e )
                {
                    \IPS\Log::debug( $e );
                    throw $e;
                }

                try
                {
                    $pharPath = str_replace( '\\', '/', rtrim( \IPS\TEMP_DIRECTORY, '/' ) ) . '/' . $application->directory . ".tar";
                    $download = new \PharData( $pharPath, 0, $application->directory . ".tar", \Phar::TAR );
                    $download->buildFromIterator( new \IPS\Application\BuilderIterator( $application ) );
                }
                catch( \PharException $e )
                {
                    \IPS\Log::debug( $e );
                    throw $e;
                }

                $file = rtrim( \IPS\TEMP_DIRECTORY, '/' ) . '/' . $application->directory . ".tar";
                $ftp->upload( $application->directory . ".tar", $file );

                /* Cleanup */
                unset( $download );
                \Phar::unlinkArchive( $pharPath );
            }

            $this->trigger( $trigger );
        }
    }

    protected function trigger(array $triggers ){
        if( is_array( $triggers ) and count( $triggers) ){
            foreach( $triggers as $trigger ){
                $url = \IPS\Http\Url::external( $trigger['url']);
                $url->setQueryString(['key' => $trigger['key'], 'app' => $trigger['app'] ] )->request(2)->get();
            }
        }
    }
}
