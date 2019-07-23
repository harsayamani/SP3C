<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogSistem extends Model
{
    protected $table = 'log_sistem';
    public $timestamps = false;
    protected $primaryKey = 'id_log';
    protected $guarded = array();
}
