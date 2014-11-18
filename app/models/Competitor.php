<?php

class Competitor extends Eloquent 
{
    protected $table = 'pentathlon_competitor';
    public $timestamps = false;
    
    public function country() {
        return $this->belongsTo('Country', 'country_id');
    }
    
    public function club() {
        return $this->belongsTo('Club', 'club_id');
    }
    
    
}

