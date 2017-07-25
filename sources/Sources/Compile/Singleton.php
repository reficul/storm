<?php

namespace IPS\storm\Sources\Compile;

class _Singleton extends \IPS\storm\Sources\Compile
{
    protected function content(){
        $this->brief = 'Singleton';
        $this->content = $this->getFile( 'singleton.txt' );
    }
}