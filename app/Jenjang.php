<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Jenjang extends Model
{
    protected $table = 'jenjang';
    public $timestamps = false;
    protected $primaryKey = 'id_jenjang';
    protected $guarded = array();
}
