<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;
use Carbon\Carbon;
use DB;
use Artisan;
use Mail;

/**
 * Tests if reminders are correctly sent to their respective patients
 */
class EmailTestController extends Controller
{
    // User must be authenticated for this controller to work
    public function __construct() {
        $this->middleware('auth');
    }

    public function send()
    {        
        //this sends to all patients, just for testing
        //$appointmentEmails = Patient::all()->pluck('email')->toArray(); 
        
        //Make dummy patients who have appointments tomorrow
        $patient = new Patient;
        $patient->id = 'AS86'; 
        $patient->forename = 'John';
        $patient->surname = 'Smith';
        $patient->dob = '1980-01-01';
        $patient->sex = 'M';                      
        $patient->email = 'lara1287@gmail.com'; 
        $patient->rating = '1';                            
        $patient->bt_results_date = '2019-01-01';                     
        $patient->bt_status = 'Unreceived';                                                                        
        $patient->save();            
        
        $patient1 = new Patient;
        $patient1->id = 'AS87'; 
        $patient1->forename = 'John';
        $patient1->surname = 'Smith';
        $patient1->dob = '1980-01-01';
        $patient1->sex = 'M';                      
        $patient1->email = 'ali1287@gmail.com'; 
        $patient1->rating = '1';                            
        $patient1->bt_results_date = '2019-01-01';                     
        $patient1->bt_status = 'Unreceived';                                                                        
        $patient1->save();          

        $patient2 = new Patient;
        $patient2->id = 'AS88'; 
        $patient2->forename = 'John';
        $patient2->surname = 'Smith';
        $patient2->dob = '1980-01-01';
        $patient2->sex = 'M';                      
        $patient2->email = 'tom1287@gmail.com'; 
        $patient2->rating = '1';                            
        $patient2->bt_results_date = '2019-01-01';                     
        $patient2->bt_status = 'Unreceived';                                                                        
        $patient2->save();           

        //Make appointments tomorrow for dummy patients

        $appointment = new Appointment;
        $appointment->id = '86';
        $appointment->patient_id = 'AS86';        
        $appointment->appointment_date = Carbon::today()->addDays(1);
        $appointment->location = 'Denmark Hill';                                        
        $appointment->save();   
        
        $appointment1 = new Appointment;
        $appointment1->id = '87';
        $appointment1->patient_id = 'AS87';        
        $appointment1->appointment_date = Carbon::today()->addDays(1);
        $appointment1->location = 'Denmark Hill';                                        
        $appointment1->save();   

        $appointment2 = new Appointment;
        $appointment2->id = '88';
        $appointment2->patient_id = 'AS88';        
        $appointment2->appointment_date = Carbon::today()->addDays(1);
        $appointment2->location = 'Denmark Hill';                                        
        $appointment2->save();   
        
        //Run artisan command to send reminders
        Artisan::call('command:mail');
        
        //Remove dummy patients and appointments
        $patient->delete();
        $patient1->delete();
        $patient2->delete();
        $appointment->delete();
        $appointment1->delete();
        $appointment2->delete();

        
        return redirect('/appointments')->with('success','Reminders successfully sent!');
        
    }

    
}
