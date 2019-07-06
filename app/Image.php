<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table= 'image';
    protected $fillable = ['name','product_id'];
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
