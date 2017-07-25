<?php

namespace IPS\storm\Sources\Compile;

class _Interface extends \IPS\storm\Sources\Compile
{
    protected function content(){
        $this->brief = 'Interface';
        $this->content = $this->getFile( 'interface.txt' );
    }
}