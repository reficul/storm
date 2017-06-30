//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class storm_hook_Application extends _HOOK_CLASS_
{

    public function assignNewVersion( $long, $human )
    {
	try
	{
	        parent::assignNewVersion( $long, $human );
	        $this->version = $human;
	        \IPS\storm\Headerdoc::i()->process( $this );
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

    public function build()
    {
	try
	{
	        \IPS\storm\Headerdoc::i()->addIndexHtml( $this );
	        parent::build();
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

    public function installOther()
    {
	try
	{
	        if( \IPS\IN_DEV and defined( 'CJ_STORM_BUILD_DEV' ) and CJ_STORM_BUILD_DEV )
	        {
	            $dir = \IPS\ROOT_PATH . "/applications/" . $this->directory . "/dev/";
	            if( !file_exists( $dir ) and $this->directory !== "storm" )
	            {
	                $app = new \IPS\storm\Apps( $this );
	                $app->addToStack = true;
	                $app->email();
	                $app->javascript();
	                $app->language();
	                $app->templates();
	            }
	        }
	
	        parent::installOther();
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
