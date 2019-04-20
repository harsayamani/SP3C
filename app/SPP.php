<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    protected $table = 'spp';
    public $timestamps = false;
    protected $primaryKey = 'id_spp';
    protected $guarded = array();
}
