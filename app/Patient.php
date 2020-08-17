<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Table Name
    protected $table = 'patients';
    protected $primaryKey = 'id';    
    public $incrementing=false;    
    public $timestamps = false;

 
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'dob',
        'appointment_date'                
    ];
   


    /**
     * Accessors which convert dates in the db into d/m/Y format for display
     */

    public function getDobAttribute($value) {        
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getAppointmentDateAttribute($value) {
        if($value < 1) {
            return ""; //Don't display anything if appointment date is not set
        } else {            
            return  \Carbon\Carbon::parse($value)->format('d/m/Y');
        }        
        
    }

    public function getBtResultsDateAttribute($value) {
        if($value < 1) {
            return ""; //Don't display anything if appointment date is not set
        } else {            
            return  \Carbon\Carbon::parse($value)->format('d/m/Y');
        }        
        
    }    
    

    public function getAgeAttribute() {
        return \Carbon\Carbon::parse($this->attributes['dob'])->age;
    }

    public function getAppointmentRecurrenceAttribute($value) {               
        
        switch ($value) {
            case 0:                
                return "None";
                break;
            case 7:
                return "Weekly";
                break;
            case 14:                
                return "Fortnightly";
                break;
            case 30:
                return "Monthly";
                break;
            case 182:
                return "Bianually";
                break;  
            case 365:
                return "Yearly";
                break;                                            
        }
    }

}
