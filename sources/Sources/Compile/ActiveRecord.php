<?php

namespace IPS\storm\Sources\Compile;

class _ActiveRecord extends \IPS\storm\Sources\Compile
{
    protected function content(){
        $this->brief = 'Active Record';
        $this->content = $this->getFile( 'ar.txt' );
    }
}