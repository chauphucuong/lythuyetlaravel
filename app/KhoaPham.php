<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoaPham extends Model
{
    protected $table = 'kpt';
    protected $fillable = ['id','monhoc','giatien','giangvien','image'];
    public $timestamps = false;
}
