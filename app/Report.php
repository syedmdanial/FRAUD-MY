<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Report extends Model
{
    use Searchable;

    protected $guarded = [];

    public function scammer(){
        return $this->belongsTo('App\Scammer');
    }
}
