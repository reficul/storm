//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

class storm_hook_applicationBuilderFilter extends _HOOK_CLASS_
{

    public function accept()
    {
	try
	{
	
	        if( $this->isFile() )
	        {
	            $skip = [];
	
	            try
	            {
	                $appKey = \IPS\Request::i()->appKey;
	
	                $app = \IPS\Application::load( $appKey );
	
	                foreach( $app->extensions( 'storm', 'Headerdoc' ) as $class )
	                {
	                    if( method_exists( $class, 'headerDocFilesSkip' ) )
	                    {
	                        $skip = array_merge( $skip, $class->headerDocFilesSkip() );
	                    }
	                }
	            }
	            catch( \Exception $e )
	            {
	            }
	
	            return !( in_array( $this->getFilename(), $skip ) );
	        }
	
	        return parent::accept();
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

    protected function getDirectoriesToIgnore()
    {
	try
	{
	        $return = parent::getDirectoriesToIgnore();
	
	        try
	        {
	            $appKey = \IPS\Request::i()->appKey;
	
	            $app = \IPS\Application::load( $appKey );
	
	            foreach( $app->extensions( 'storm', 'Headerdoc' ) as $class )
	            {
	                if( method_exists( $class, 'headerDocDirSkip' ) )
	                {
	                    $return = array_merge( $return, $class->headerDocDirSkip() );
	                }
	            }
	        }
	        catch( \Exception $e )
	        {
	        }
	
	        return $return;
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
