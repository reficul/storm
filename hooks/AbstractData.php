//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if( !defined( '\IPS\SUITE_UNIQUE_KEY' ) )
{
    exit;
}

abstract class storm_hook_AbstractData extends _HOOK_CLASS_
{
    protected $closedKeys = [
        'storm_bt',
        'storm_cache'
    ];

    public function __get( $key )
    {
	try
	{
	        if( ( ( defined( 'CJ_STORM_PROFILER' ) and CJ_STORM_PROFILER ) or ( defined( 'CJ_STORM_PROFILER_SAFE_MODE' ) and CJ_STORM_PROFILER_SAFE_MODE and \IPS\storm\Profiler::profilePassCheck() ) ) )
	        {
	
	            if( !isset( $this->_data[ $key ] ) )
	            {
	                if( $this->exists( $key ) )
	                {
	                    $cache = $this->get( $key );
	                    $value = json_decode( $cache, true );
	
	                    if( !in_array( $key, $this->closedKeys ) )
	                    {
	                        \IPS\storm\Profiler::i()->cacheLog( [
	                            'type' => 'get',
	                            'key' => $key,
                            //                            'cache' => var_export($cache, TRUE),
	                            'backtrace' => var_export( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ), true )
	                        ] );
	                    }
	                    $this->_data[ $key ] = $value;
	                }
	                else
	                {
	                    throw new \OutOfRangeException;
	                }
	            }
	
	            return $this->_data[ $key ];
	        }
	
	        return parent::__get( $key );
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

    public function __set( $key, $value )
    {
	try
	{
	
	        if( ( ( defined( 'CJ_STORM_PROFILER' ) and CJ_STORM_PROFILER ) or ( defined( 'CJ_STORM_PROFILER_SAFE_MODE' ) and CJ_STORM_PROFILER_SAFE_MODE and \IPS\storm\Profiler::profilePassCheck() ) ) )
	        {
	            if( !in_array( $key, $this->closedKeys ) )
	            {
	                \IPS\storm\Profiler::i()->cacheLog( [
	                    'type' => 'set',
	                    'key' => $key,
                    //                    'cache' => var_export($value, TRUE),
	                    'backtrace' => var_export( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ), true )
	                ] );
	            }
	        }
	
	        parent::__set( $key, $value );
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

    public function storeWithExpire( $key, $value, \IPS\DateTime $expire, $fallback = false )
    {
	try
	{
	        if( ( ( defined( 'CJ_STORM_PROFILER' ) and CJ_STORM_PROFILER ) or ( defined( 'CJ_STORM_PROFILER_SAFE_MODE' ) and CJ_STORM_PROFILER_SAFE_MODE and \IPS\storm\Profiler::profilePassCheck() ) ) )
	        {
	            if( !in_array( $key, $this->closedKeys ) )
	            {
	                \IPS\storm\Profiler::i()->cacheLog( [
	                    'type' => 'set',
	                    'key' => $key,
                    //                    'cache' => var_export($value, TRUE),
	                    'backtrace' => var_export( debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS ) )
	                ] );
	            }
	        }
	
	        parent::storeWithExpire( $key, $value, $expire, $fallback );
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
