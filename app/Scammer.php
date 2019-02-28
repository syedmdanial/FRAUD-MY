<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Scammer extends Model
{
    use Searchable;

    protected $guarded = [];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users(){
        return $this->belongsToMany('App\User'); 
    }

    public function reports(){
        return $this->hasMany('App\Report');
    }
}
