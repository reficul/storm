<?php

/**
 * @brief       Proxyclass Class
 * @author      <a href='http://codingjungle.com'>Michael Edwards</a>
 * @copyright   (c) 2017 Michael Edwards
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       1.0.0
 * @version     3.0.4
 */

namespace IPS\storm;

if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] :
            'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Proxyclass extends \IPS\Patterns\Singleton
{

    public static $instance = null;

    protected $save = 'proxyclasses';

    public function run( $data = [] )
    {
        $i = 0;
        if( isset( \IPS\Data\Store::i()->storm_proxyclass_files ) )
        {
            $iterator = \IPS\Data\Store::i()->storm_proxyclass_files;
            $totalFiles = $data[ 'total' ];
            $limit = 50;

            foreach( $iterator as $key => $file )
            {
                $i++;
                $filePath = $file[ 0 ];
                $this->build( $filePath );
                unset( $iterator[ $key ] );
                if( $i == $limit )
                {
                    break;
                }
            }

            \IPS\Data\Store::i()->delete( 'storm_proxyclass_files' );
        }

        if( $i )
        {
            if( is_array( $iterator ) and count( $iterator ) )
            {
                \IPS\Data\Store::i()->storm_proxyclass_files = $iterator;
            }

            if( $data[ 'current' ] )
            {
                $offset = $data[ 'current' ] + $i;
            }
            else
            {
                $offset = $i;
            }

            return [ 'total' => $totalFiles, 'current' => $offset, 'progress' => $data[ 'progress' ] ];
        }
        else
        {
            return null;
        }
    }

    public function build( $file )
    {
        $ds = DIRECTORY_SEPARATOR;

        $root = \IPS\ROOT_PATH;

        $save = $root . $ds . $this->save . $ds;

        if( !is_dir( $save ) )
        {
            return;
        }

        $content = \file_get_contents( $file );
        $content = \preg_replace( '!/\*.*?\*/!s', '', $content );
        $content = \preg_replace( '/\n\s*\n/', "\n", $content );

        \preg_match( '/namespace(.+?)([^\;]+)/', $content, $matched );

        $namespace = null;

        if( isset( $matched[ 0 ] ) )
        {
            $namespace = $matched[ 0 ];
        }

        $regEx = '#(?:(?<!\w))(?:[^\w]|\s+)(?:(?:(?:abstract|final|static)\s+)*)class\s+([-a-zA-Z0-9_]+)?#';
        $run = function( $matches ) use ( $namespace, $save )
        {
            if( isset( $matches[ 1 ] ) )
            {
                if( mb_substr( $matches[ 1 ], 0, 1 ) === '_' )
                {
                    $content = '';
                    $append = \ltrim( $matches[ 1 ], '\\' );
                    $class = \str_replace( '_', '', \ltrim( $matches[ 1 ], '\\' ) );
                    $alt = \str_replace( [
                        "\\",
                        " ",
                        ";"
                    ], "_", $namespace );

                    if( !\is_file( $save . $alt . '.php' ) )
                    {
                        $content = "<?php\n\n";

                        if( $namespace )
                        {
                            $content .= $namespace . ";\n";
                        }
                    }

                    $content .= str_replace( '_', '', $matches[ 0 ] ) . ' extends ' . $append . '{}' . "\n";
                    $createdClass[ \str_replace( 'namespace ', '', $namespace ) ][] = $class;

                    \file_put_contents( $save . $alt . ".php", $content, FILE_APPEND );
                    \chmod( $save . $alt . ".php", 0777 );
                }
            }
        };
        preg_replace_callback( $regEx, $run, $content, 1 );

    }

    public function dirIterator()
    {
        $ds = DIRECTORY_SEPARATOR;
        $root = \IPS\ROOT_PATH;
        $save = $root . $ds . $this->save . $ds;

        if( \is_dir( $save ) )
        {
            $files = \glob( $save . "*" );

            foreach( $files as $file )
            {
                if( \is_file( $file ) )
                {
                    \unlink( $file );
                }
            }

            \rmdir( $save );
        }

        if( !is_dir( $save ) )
        {
            \mkdir( $save );
            \chmod( $save, 0777 );
        }

        $exclude = [
            $this->save,
            '.htaccess',
            'datastore',
            'plugins',
            'dev',
            'admin',
            'api',
            'interface',
            'uploads',
            'data',
            'extensions',
            'hooks',
            'setup',
            'modules',
            'tasks',
            'widgets',
            'Plugin',
            '3rdparty',
            '3rd_party',
            'themes',
            'conf_global.php',
            'index.php',
            'sitemap.php',
            'constants.php',
            'init.php',
            'error.php',
            '404error.php',
            'StormTemplates'
        ];

        $filter = function( $file, $key, $iterator ) use ( $exclude )
        {
            if( !\in_array( $file->getFilename(), $exclude ) )
            {
                return true;
            }

            return false;
        };

        $dirIterator = new \RecursiveDirectoryIterator(
            $root,
            \RecursiveDirectoryIterator::SKIP_DOTS
        );

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveCallbackFilterIterator( $dirIterator, $filter ),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        $iterator = new \RegexIterator( $iterator, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH );
        $iterator = iterator_to_array( $iterator );

        if( isset( \IPS\Data\Store::i()->storm_proxyclass_files ) )
        {
            unset( \IPS\Data\Store::i()->storm_proxyclass_files );
        }

        \IPS\Data\Store::i()->storm_proxyclass_files = $iterator;

        return count( $iterator );
    }
}