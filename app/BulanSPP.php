<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BulanSPP extends Model
{
    protected $table = 'bulan_spp';
    public $timestamps = false;
    protected $primaryKey = 'id_bulan';
    protected $guarded = array();
}
