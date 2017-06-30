<?php

/**
 * @brief       Settings Class
 * @author      <a href='http://codingjungle.com'>Michael Edwards</a>
 * @copyright   (c) 2017 Michael Edwards
 * @package     IPS Social Suite
 * @subpackage  Storm
 * @since       2.0.0
 * @version     3.0.4
 */

namespace IPS\storm\modules\admin\configuration;

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    header( ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] : 'HTTP/1.0' ) . ' 403 Forbidden' );
    exit;
}

/**
 * settings
 */
class _settings extends \IPS\Dispatcher\Controller
{
    /**
     * Execute
     *
     * @return    void
     */
    public function execute()
    {
        \IPS\Dispatcher::i()->checkAcpPermission( 'settings_manage' );
        parent::execute();
    }

    /**
     * ...
     *
     * @return    void
     */
    protected function manage()
    {
        \IPS\Output::i()->title = "Settings";
        $form = \IPS\storm\Settings::form();
        \IPS\Output::i()->sidebar['actions']['sync'] = array(
            'icon'		=> 'syn',
            'title'		=> 'Sync',
            'link'		=> \IPS\Http\Url::internal( 'app=storm&module=configuration&controller=settings&do=sync' )
        );
        \IPS\Output::i()->output = $form;
    }

    protected function sync(){
        \IPS\storm\Sync::i()->send();
        \IPS\Output::i()->redirect( \IPS\Http\Url::internal( 'app=storm&module=configuration&controller=settings'));
    }

    // Create new methods with the same name as the 'do' parameter which should execute it
    protected function getFields()
    {
        $table = \IPS\Request::i()->table;
        $fields = \IPS\Db::i()->query( "SHOW COLUMNS FROM " . \IPS\Db::i()
                                                                     ->real_escape_string( \IPS\Db::i()->prefix . $table ) );
        $f = [];
        foreach( $fields as $field )
        {
            $f[ array_values( $field )[ 0 ] ] = array_values( $field )[ 0 ];
        }

        $data = new \IPS\storm\Forms\Select(
            'storm_query_columns',
            null,
            false,
            [
                'options' => $f,
                'parse' => false,
            ],
            null,
            null,
            null,
            'js_storm_query_columns'
        );

        $send[ 'error' ] = 0;
        $send[ 'html' ] = $data->html();
        \IPS\Output::i()->json( $send );
    }
}