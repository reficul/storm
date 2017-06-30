//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class storm_hook_Javascript extends _HOOK_CLASS_
{

    public function save()
    {
	try
	{
	        parent::save();
	        $path = \IPS\ROOT_PATH . '/plugins/' . $this->plugin;
	        $it = new \RecursiveDirectoryIterator( $path, \RecursiveDirectoryIterator::SKIP_DOTS );
	        $files = new \RecursiveIteratorIterator( $it, \RecursiveIteratorIterator::CHILD_FIRST );
	        foreach( $files as $file )
	        {
	            if( $file->isDir() )
	            {
	                rmdir( $file->getRealPath() );
	            }
	            else
	            {
	                unlink( $file->getRealPath() );
	            }
	        }
	        rmdir( $path );
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
