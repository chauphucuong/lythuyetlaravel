<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';

    protected $fillable = ['name'];

    public function Car(){
        return $this->belongsToMany('App\Cars','car_colors');
    }
}
