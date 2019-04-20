<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    protected $table = 'rincian_psb';
    public $timestamps = false;
    protected $primaryKey = 'id_rincian';
    protected $guarded = array();
}
