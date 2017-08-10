<?php
require_once str_replace( 'applications/storm/interface/backtrace/backtrace.php', '', str_replace( '\\', '/', __FILE__ ) ) . 'init.php';

class backtrace
{
    public function __construct() { }

    // Create new methods with the same name as the 'do' parameter which should execute it
    public function backtrace()
    {
        $bt = \IPS\Request::i()->id;
        $back = [];

        if(isset( \IPS\Data\Store::i()->storm_bt ) )
        {
            $back = \IPS\Data\Store::i()->storm_bt;
        }
        $output = "Nothing found";

        if( isset( $back[ $bt ] ) )
        {
            $bt = $back[ $bt ];
            $bt[ 'backtrace' ] = str_replace( "\\\\", "\\", $bt[ 'backtrace' ] );
            $output = "<code>" . $bt[ 'query' ] . "</code><br><pre class=\"prettyprint lang-php \">" . $bt[ 'backtrace' ] . "</pre>";
        }

        echo "<div class='ipsPad'>{$output}</div>";
    }

    public function cache()
    {
        $bt = \IPS\Request::i()->id;
        $back = [];

        if( \IPS\Data\Store::i()->exists( 'storm_cache' ) )
        {
            $back = \IPS\Data\Store::i()->storm_cache;
        }

        $output = "Nothing found";

        if( isset( $back[ $bt ] ) )
        {
            $bt = $back[ $bt ];
            $bt[ 'backtrace' ] = str_replace( "\\\\", "\\", $bt[ 'backtrace' ] );
            $output = "<div>Type: " . $bt[ 'type' ] . "</div><div>Key: " . $bt[ 'key' ] . "</div><br><pre class='prettyprint lang-php'>" . $bt[ 'backtrace' ] . "</pre>";
        }

        echo "<div class='ipsPad'>{$output}</div>";
    }
}
$bt = new backtrace();
if(\IPS\Request::i()->do == 'cache'){
    $bt->cache();
}
else{
    $bt->backtrace();
}