<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PSB extends Model
{
    protected $table = 'psb';
    public $timestamps = false;
    protected $primaryKey = 'id_psb';
    protected $guarded = array();
    public $incrementing = false;
}
