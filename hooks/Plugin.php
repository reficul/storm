//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class storm_hook_Plugin extends _HOOK_CLASS_
{

    public static function addExceptionHandlingToHookFile( $file )
    {
        if( defined( 'CJ_STORM_REGEX' ) and CJ_STORM_REGEX )
        {
            $contents = '';

            $fh = fopen( $file, 'r' );
            while( $line = fgets( $fh ) )
            {
                $contents .= $line;
            }

            return $contents;
        }

        $hayStack = \file_get_contents( $file );
        $haystack = str_replace( [ "\n", "\r", "\r\n", "\t", " " ], '', $hayStack );
        $needle = 'method_exists(get_parent_class(),__FUNCTION__)){returncall_user_func_array(\'parent::\'.__FUNCTION__,func_get_args())';

        if( mb_strpos( $haystack, $needle ) !== false )
        {
            return $hayStack;
        }

        return parent::addExceptionHandlingToHookFile( $file );
    }
}
