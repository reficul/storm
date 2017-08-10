<?php

/**
 * @brief       Query Active Record
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

class _Query extends \IPS\Patterns\ActiveRecord
{
    /**
     * @brief    [ActiveRecord] Database Prefix
     */
    public static $databasePrefix = 'query_';

    /**
     * @brief    [ActiveRecord] ID Database Column
     */
     public static $databaseColumnId = 'hash';

    /**
     * @brief    [ActiveRecord] Database table
     */
    public static $databaseTable = 'storm_query';


    /**
     * @brief   Bitwise keys
     */
    protected static $bitOptions = array();

    /**
     * @brief    [ActiveRecord] Multiton Store
     */
    protected static $multitons;

    public function get_backtrace(){
        return json_decode( $this->bt, true );
    }
}