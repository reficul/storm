//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class storm_hook_multipleRedirect extends _HOOK_CLASS_
{

    public function __construct( $url, $callback, $finished, $finalRedirect = true )
    {
        if( \IPS\Request::i()->storm )
        {
            $url = $url->setQueryString( [ 'storm' => \IPS\Request::i()->storm ] );
            $finished = function()
            {
                \IPS\Output::i()
                           ->redirect( \IPS\Http\Url::internal( 'app=storm&module=configuration&controller=plugins' )
                                                    ->setQueryString( [
                                                        'storm' => \IPS\Request::i()->storm,
                                                        'do' => "doDev"
                                                    ] ) );
            };
        }

        parent::__construct( $url, $callback, $finished, $finalRedirect );
    }
}
