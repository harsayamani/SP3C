<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $dates = ['expired_at'];
    protected $table = 'pesan';
}
