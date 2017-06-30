<?php

/**
 * @brief       Settings Class
 * @author      -storm_author-
 * @copyright   -storm_copyright-
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       1.0.0
 * @version     -storm_version-
 */

namespace IPS\storm;

if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] : 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Settings extends \IPS\Patterns\Singleton
{
    protected static $instance = null;

    public static function mbUcfirst( $string )
    {
        return mb_strtoupper( mb_substr( $string, 0, 1 ) ) . mb_substr( $string, 1 );
    }

    public static function buildCss( $css )
    {
        if( \IPS\Data\Store::i()->exists( 'dev_css' ) )
        {
            \IPS\Data\Store::i()->delete( 'dev_css' );
        }

        $url = null;
        $files = [];

        foreach( $css as $c )
        {
            $data = \IPS\Http\Url::external( $c );
            $files[] = $data->queryString[ 'css' ];
        }

        \IPS\Data\Store::i()->dev_css = $files;

        return str_replace( [ 'http://', 'https://' ], '//',
                \IPS\Settings::i()->base_url ) . "applications/storm/interface/css/css.php";
    }

    public static function form()
    {
        $s = \IPS\Settings::i();
        $form = \IPS\storm\Forms::i( static::elements(), $s );
        $status = new \IPS\Helpers\Form\Matrix;

        $status->columns = array(
            'storm_ftp_key' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Text( $key, $value, $data );
            },
            'storm_ftp_interface_host' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Text( $key, $value );
            },
            'storm_ftp_app' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Node( $key, $value, false, [ 'class' => 'IPS\Application'] );
            },
            'storm_ftp_host' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Text( $key, $value );
            },
            'storm_ftp_username' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Text( $key, $value, $data );
            },
            'storm_ftp_pass' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Password( $key, $value );
            },
            'storm_ftp_port' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Number( $key, $value );
            },
            'storm_ftp_timeout' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Number( $key, $value );
            },
            'storm_ftp_secure' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Checkbox( $key, $value, $data );
            },
            'storm_ftp_ssh' => function( $key, $value, $data )
            {
                return new \IPS\Helpers\Form\Checkbox( $key, $value, $data );
            }
        );

        $data = json_decode( $s->storm_ftp_details, true ) ;
//        print_r($data);exit;
        if( $data and is_array( $data ) and count( $data ) )
        {
            foreach( $data as $val )
            {
                if( $val[ 'storm_ftp_key' ] )
                {
                    $status->rows[] = $val;
                }
            }
        }

        $form->addMatrix( 'storm_ftp_details', $status );
        if( $vals = $form->values() )
        {
            $new = [];
            foreach( $vals['storm_ftp_details'] as $d){
                if( $d['storm_ftp_app'] instanceof  \IPS\Application ){

                    $d['storm_ftp_app'] = $d['storm_ftp_app']->directory;
                }
                $new[] = $d;
            }
            $vals['storm_ftp_details'] = json_encode( $new );
            $form->saveAsSettings( $vals );
            \IPS\Output::i()
                       ->redirect( \IPS\Http\Url::internal( 'app=storm&module=configuration&controller=settings' ) );
        }

        return $form;
    }

    protected static function elements()
    {

//        $key = md5( \IPS\Settings::i()->);

        $e[] = [
            'class' => "YesNo",
            'name' => "storm_settings_tab_debug_templates",
            'tab' => 'general'
        ];

        $e[] = [
            'class' => "YesNo",
            'name' => "storm_settings_tab_debug_css"
        ];

        $e[] = [
            'class' => "YesNo",
            'name' => "storm_settings_tab_debug_css_alt"
        ];

        $e[] = [
            'class' => "YesNo",
            'name' => 'storm_profiler_is_fixed'
        ];

        $e[] = [
            'type' => 'tab',
            'name' => 'remote'
        ];
        $conf = \IPS\Settings::i();
        $key = sha1($conf->getFromConfGlobal('base_url').$conf->getFromConfGlobal('board_start'));
        $e[] = [
            'type' => 'dummy',
            'name' => 'storm_remote_key_use',
            'desc' => 'storm_remote_key_use_desc',
            'default' => $key
        ];
        $e[] = [
            'type' => 'dummy',
            'name' => 'storm_remote_url',
            'desc' => 'storm_remote_url_desc',
            'default' => \IPS\Settings::i()->base_url.'applications/storm/interface/sync/sync.php'
        ];

        $e[] = [
            'type' => 'dummy',
            'name' => 'storm_cron_task',
            'default' => '<strong>'.PHP_BINDIR . '/php -d memory_limit=-1 -d max_execution_time=0 ' . \IPS\ROOT_PATH . '/applications/storm/interface/sync/task.php'.'</strong>',
            'desc' => 'storm_cron_task_desc'
        ];
        $e[] = [
            'name' => 'storm_ftp_path'
        ];

        return $e;
    }

}
