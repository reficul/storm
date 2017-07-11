//<?php

/* To prevent PHP errors (extending class does not exist) revealing path */
if ( !defined( '\IPS\SUITE_UNIQUE_KEY' ) ) {
    exit;
}

class storm_hook_Output extends _HOOK_CLASS_
{

    public function sendOutput(
        $output = '',
        $httpStatusCode = 200,
        $contentType = 'text/html',
        $httpHeaders = [],
        $cacheThisPage = true,
        $pageIsCached = false,
        $parseFileObjects = true
    ) {
        if ( ( ( defined( 'CJ_STORM_PROFILER' ) and CJ_STORM_PROFILER ) or ( defined( 'CJ_STORM_PROFILER_SAFE_MODE' ) and CJ_STORM_PROFILER_SAFE_MODE and \IPS\storm\Profiler::profilePassCheck() ) ) and !\IPS\Request::i()
                ->isAjax()
        ) {
            /* Replace language stack keys with actual content */
            if ( \IPS\Dispatcher::hasInstance() and !in_array( $contentType,
                                                               [
                                                                   'text/javascript',
                                                                   'text/css',
                                                                   'application/json',
                                                               ] ) and $output and !$pageIsCached
            ) {
                \IPS\Member::loggedIn()->language()->parseOutputForDisplay( $output );
            }

            /* Parse file storage URLs */
            if ( $output and $parseFileObjects ) {
                $this->parseFileObjectUrls( $output );
            }

            /* Full page caching for guests */
            if (
                \IPS\CACHE_PAGE_TIMEOUT and // Page caching is enabled
                $cacheThisPage and // Some pages can specify not to be cached (for example, when displaying a cached page, you don't want it recached)
                !isset( \IPS\Request::i()->cookie[ 'noCache' ] ) and // A noCache cookie might get set to not cache a particular guest (for example, if they have added items to their cart in the store)
                mb_strtolower( $_SERVER[ 'REQUEST_METHOD' ] ) == 'get' and // Is a HTTP GET request (don't cache output for POSTs)
                !isset( \IPS\Request::i()->csrfKey ) and // CSRF key isn't present (which would be like a POST request)
                $contentType == 'text/html' and // Output is HTML (don't cache RSS feeds, JSON output, etc)
                \IPS\Dispatcher::hasInstance() and class_exists( 'IPS\Dispatcher',
                                                                 false ) and \IPS\Dispatcher::i()->controllerLocation === 'front' and // Is a normal, front-end page (necessary to know if user is logged in)
                !\IPS\Member::loggedIn()->member_id                                            // User is not logged in
            ) {
                \IPS\Data\Cache::i()->storeWithExpire( 'page_' . md5( (int) \IPS\Request::i()
                                                                          ->isSecure() . ( !empty( $_SERVER[ 'HTTP_HOST' ] ) ? $_SERVER[ 'HTTP_HOST' ] : $_SERVER[ 'SERVER_NAME' ] ) . '/' . $_SERVER[ 'REQUEST_URI' ] ) . '_' . \IPS\Member::loggedIn()
                                                           ->language()->id . '_' . \IPS\Theme::i()->id,
                                                       [
                                                           'output' => str_replace( \IPS\Session::i()->csrfKey, '{{csrfKey}}', $output ),
                                                           'code' => $httpStatusCode,
                                                           'contentType' => $contentType,
                                                           'httpHeaders' => $httpHeaders,
                                                           'lastUpdated' => time(),
                                                       ], \IPS\DateTime::create()->add( new\DateInterval( 'PT' . \IPS\CACHE_PAGE_TIMEOUT . 'S' ) ), true );
            }
            /* Query Log (has to be done after parseOutputForDisplay because runs queries and after page caching so the log isn't misleading) */
            $contentTypeTypes = explode( '/', $contentType );
            if ( ( ( defined( 'CJ_STORM_PROFILER' ) and CJ_STORM_PROFILER ) or ( defined( 'CJ_STORM_PROFILER_SAFE_MODE' ) and CJ_STORM_PROFILER_SAFE_MODE and \IPS\storm\Profiler::profilePassCheck() ) ) and ( $contentTypeTypes[ 0 ] == 'text' OR ( $contentTypeTypes[ 0 ] == 'application' AND $contentTypeTypes[ 1 ] == 'json' ) ) ) {
                /* Close the session and run tasks now so we can see those queries */
                session_write_close();
                if ( \IPS\Dispatcher::hasInstance() ) {
                    \IPS\Dispatcher::i()->__destruct();
                }

                /* And run */
                if ( !\IPS\Request::i()->isAjax() and $contentType == "text/html" ) {
                    try {
                        $logs = \IPS\storm\Profiler::i( 1 )->run();
                        $output = str_replace( '</body>', $logs, $output );
                    } catch ( \Exception $e ) {
                    }
                }
            }

            /* Remove anything from the output buffer that should not be there as it can confuse content-length */
            @ob_end_clean();

            /* Trim any blank spaces before the beginning of output */
            $output = ltrim( $output );

            /* Set HTTP status */
            $this->sendStatusCodeHeader( $httpStatusCode );

            /* Start buffering */
            ob_start();

            /* If the browser supports gzip, gzip the content - we do this ourselves so that we can send Content-Length even with mod_gzip */
            if ( isset( $_SERVER[ 'HTTP_ACCEPT_ENCODING' ] ) and \strpos( $_SERVER[ 'HTTP_ACCEPT_ENCODING' ],
                                                                          'gzip' ) !== false
            ) {
                if ( function_exists( 'gzencode' ) and (bool) ini_get( 'zlib.output_compression' ) === false ) {
                    $output = gzencode( $output ); // mod_gzip will encode pages, but we want to encode ourselves so that Content-Length is correct
                    $this->sendHeader( "Content-Encoding: gzip" ); // Tells the server we've alredy encoded so it doesn't need to
                }
            }

            /* Output */
            print $output;

            /* Update advertisement impression counts, if appropriate */
            \IPS\core\Advertisement::updateImpressions();

            /* Send headers */
            $this->sendHeader( "Content-type: {$contentType};charset=UTF-8" );

            /* Send content-length header, but only if not using zlib.output_compression, because in that case the length we send in the header
                will not match the length of the actual content sent to the browser, breaking things (particularly json) */
            if ( (bool) ini_get( 'zlib.output_compression' ) === false ) {
                $size = ob_get_length();
                $this->sendHeader( "Content-Length: {$size}" ); // Makes sure the connection closes after sending output so that tasks etc aren't holding it open
            }

            foreach ( $httpHeaders as $key => $header ) {
                $this->sendHeader( $key . ': ' . $header );
            }
            $this->sendHeader( "Connection: close" );

            /* If we are running our test suite, we don't want to output or exit, which will allow the test suite to capture the response */
            if ( \IPS\ENFORCE_ACCESS === true AND mb_strtolower( php_sapi_name() ) == 'cli' ) {
                return;
            }

            /* Flush and exit */
            @ob_end_flush();
            @flush();

            /* If using PHP-FPM, close the request so that __destruct tasks are run after data is flushed to the browser
                @see http://www.php.net/manual/en/function.fastcgi-finish-request.php */
            if ( function_exists( 'fastcgi_finish_request' ) ) {
                fastcgi_finish_request();
            }

            exit;
        }
        else {
            parent::sendOutput( $output, $httpStatusCode, $contentType, $httpHeaders, $cacheThisPage, $pageIsCached,
                                $parseFileObjects );
        }
    }
}
