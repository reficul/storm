//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class storm_hook_Lang extends _HOOK_CLASS_
{

    public function parseOutputForDisplay( &$output )
    {
	try
	{
	        \IPS\storm\Profiler::i()->timeStart();
	        parent::parseOutputForDisplay( $output );
	        \IPS\storm\Profiler::i()->timeEnd( 'parseOutputForDisplay' );
	}
	catch ( \RuntimeException $e )
	{
		if ( method_exists( get_parent_class(), __FUNCTION__ ) )
		{
			return call_user_func_array( 'parent::' . __FUNCTION__, func_get_args() );
		}
		else
		{
			throw $e;
		}
	}
    }
}
