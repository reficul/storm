//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) ) {
    exit;
}

class storm_hook_Theme extends _HOOK_CLASS_
{
    static protected $clearDir = true;

    public static function runProcessFunction( $content, $functionName )
    {
        if ( \IPS\Settings::i()->storm_settings_tab_debug_templates ) {
            /* If it's already been built, we don't need to do it again */
            if ( function_exists( 'IPS\Theme\\' . $functionName ) ) {
                return;
            }

            /* Build Function */
            $function = 'namespace IPS\Theme;' . "\n" . $content;
            static::runDebugTemplate( $functionName, $function );
        }
        else {
            parent::runProcessFunction( $content, $functionName );
        }

    }

    protected static function runDebugTemplate( $functionName, $content )
    {
        if ( ( mb_strpos( $functionName, 'css_' ) === false and \IPS\Settings::i()->storm_settings_tab_debug_templates ) or ( mb_strpos( $functionName, 'css_' ) !== false and \IPS\Settings::i()->storm_settings_tab_debug_css ) ) {
            $dir = \IPS\ROOT_PATH . "/StormTemplates";

            if ( !is_dir( $dir ) ) {
                @mkdir( $dir, 0777, true );
            }

            $content = "<?php\n" . $content;
            $chash = md5( $content );
            $fname = str_replace( "/", "_", $functionName );
            $file = $dir . "/" . $fname . ".php";
            $hash = false;
            //$content = preg_replace( "#<!--(.*?)-->#", '', $content );

            if ( file_exists( $file ) ) {
                $hash = md5_file( $file );
            }

            $build = true;

            if ( $hash ) {
                if ( $hash == $chash ) {
                    $build = false;
                }
            }

            if ( $build ) {
                \file_put_contents( $file, $content );
            }

            include_once( $file );
        }
        else {
            return parent::runDebugTemplate( $functionName, $content );
        }
    }

}
