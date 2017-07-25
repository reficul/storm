<?php

namespace IPS\storm\Sources\Compile;

class _Trait extends \IPS\storm\Sources\Compile
{
    protected function content(){
        $this->brief = 'Trait';
        $this->content = $this->getFile( 'trait.txt' );
    }
}