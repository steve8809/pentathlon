<?php

class Country extends Eloquent {
    protected $table = 'pentathlon_country';
    
    public function competitor() {
        return $this->hasMany('Competitor');
    }
}

