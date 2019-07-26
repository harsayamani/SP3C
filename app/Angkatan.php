<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $table = 'angkatan';
    public $timestamps = false;
    protected $primaryKey = 'id_angkatan';
    protected $guarded = array();
}
