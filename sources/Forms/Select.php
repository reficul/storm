<?php

/**
 * @brief       Select Class
 * @author      -storm_author-
 * @copyright   -storm_copyright-
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       -storm_since_version-
 * @version     -storm_version-
 */

namespace IPS\storm\Forms;

if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] :
            'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

class _Select extends \IPS\Helpers\Form\Select
{
    /**
     * Validate
     *
     * @throws    \OutOfRangeException
     * @return    TRUE
     */
    public function validate()
    {
        return true;
    }
}