<?php

/**
 * @brief       Index Class
 * @author      <a href='http://codingjungle.com'>Michael Edwards</a>
 * @copyright   (c) 2017 Michael Edwards
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       1.0.1
 * @version     3.0.4
 */

namespace IPS\storm\modules\front\bitbucket;

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] : 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

/**
 * index
 */
class _index extends \IPS\Dispatcher\Controller
{

    /**
     * Execute
     *
     * @return    void
     */
    public function execute()
    {

        parent::execute();
    }

    /**
     * ...
     *
     * @return    void
     */
    protected function manage()
    {
        \IPS\storm\Bitbucket::createNewBitbucket();

        \IPS\Output::i()->output = '';
    }

    // Create new methods with the same name as the 'do' parameter which should execute it
}