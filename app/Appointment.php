<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    public $incrementing=false;     
    public $timestamps = false;
}
