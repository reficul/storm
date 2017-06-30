<?php

/**
 * @brief       Storm Headerdoc extension: Storm
 * @author      <a href='http://codingjungle.com'>Michael Edwards</a>
 * @copyright   (c) 2017 Michael Edwards
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       1.0.4
 * @version     3.0.4
 */

namespace IPS\storm\extensions\storm\Headerdoc;

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] : 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

/**
 * storm
 */
class _storm extends \IPS\storm\Headerdoc\HeaderdocAbstract
{

    /**
     * enable headerdoc
     **/
    public function headerDocEnabled()
    {
        return true;
    }

    /**
     * enable add index.html
     **/
    public function indexEnabled()
    {
        return true;
    }

    /**
     * files to skip during building of the tar
     **/
    public function headerDocFilesSkip()
    {
        return [];
    }

    /**
     * directories to skip during building of the tar
     **/
    public function headerDocDirSkip()
    {
        return [];
    }

    /**
     * an array of files/folders to exclude in the headerdoc
     **/
    public function headerDocExclude()
    {
        return [];
    }
}