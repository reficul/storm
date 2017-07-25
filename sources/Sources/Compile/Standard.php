<?php

namespace IPS\storm\Sources\Compile;

class _Standard extends \IPS\storm\Sources\Compile
{
    protected function content(){
        $this->brief = 'Standard';
        $this->content = $this->getFile( 'standard.txt' );
    }
}