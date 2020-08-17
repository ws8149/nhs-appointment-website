<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Patient;
use Carbon\Carbon;
use DB;
use Mail;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails to patients';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        
        //Get emails of patients who have an appointment tomorrow
        $appointmentEmails = DB::table('appointments')
                        ->join('patients', 'appointments.patient_id', '=', 'patients.id')
                        ->select('patients.email')
                        ->whereDate('appointments.appointment_date', Carbon::today()->addDays(1))
                        ->pluck('patients.email')
                        ->toArray();             
        
        print_r($appointmentEmails);

        //Send appointment reminder
        Mail::send('emails.reminder', [], function($message) use ($appointmentEmails)
        {    
            $message->to($appointmentEmails)->subject('Your appointment reminder!');    
        });


        //Get emails of patients whose blood test results date have passed 
        //and their status still remains unreceived for a week
        $btEmails = DB::table('patients')                
                     ->whereDate('bt_results_date', '<' , Carbon::today()->subDays(7))
                     ->where('bt_status', '=', 'Unreceived')
                     ->pluck('email')
                     ->toArray();               

        //Send blood test results reminder
        Mail::send('emails.btreminder', [], function($message) use ($btEmails)
        {    
            $message->to($btEmails)->subject('Your blood test reminder!');    
        });

        echo 'sent';

    }
}
