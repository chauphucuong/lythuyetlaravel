<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $table = 'cars';
     
    protected $fillable = ['name','price'];

    public function Color(){
        return $this->belongsToMany('App\Colors','car_colors');
    }
}
