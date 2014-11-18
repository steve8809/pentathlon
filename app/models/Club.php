<?php

class Club extends Eloquent 
{
    protected $table = 'pentathlon_club';
    
    public function competitor() {
        return $this->hasMany('Competitor');
    }
}

