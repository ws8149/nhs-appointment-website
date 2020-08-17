<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    // Table Name
    protected $table = 'hospitals';
    protected $primaryKey = 'id';
    public $incrementing=false;    
    public $timestamps = false;
}
