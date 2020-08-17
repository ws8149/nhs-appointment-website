<?php

namespace App\Http\Controllers;
use App\Patient;
use App\Appointment;
use DB;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{

    // User must be authenticated for this controller to work
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = DB::table('appointments')
        ->join('patients', 'appointments.patient_id', '=', 'patients.id')
        ->select('appointments.*', 'patients.forename', 'patients.surname')
        ->get();        
        return view('appointments.index')->with('appointments', $appointments); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all();              ;
        return view('appointments.create')->with('patients', $patients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate user input
        $this->validate($request, [            
            'patient_id' => 'required',                        
            'appointment_date' => 'required',                                 
            'location' => 'required',                                 
        ]);                        
        

        //create model
        $appointment = new Appointment;        
        $appointment->patient_id = $request->input('patient_id');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->location = $request->input('location');       
                
        //save and redirect
        $appointment->save();        
        return redirect('/appointments')->with('success','Appointment Record Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $appointment = Appointment::find($id);
        $patient = Patient::find($appointment->patient_id);       
         
        return view('appointments.edit')->with(compact('appointment','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //find appointment
        $appointment = Appointment::find($id);
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->location = $request->input('location');        
        
        //save and redirect
        $appointment->save();
        return redirect('/appointments')->with('success','Appointment Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     * If patient has a recurring appointment, create an appointment after deleting previous one
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $patient = Patient::find($appointment->patient_id);               
        
        //If patient has a recurring appointment, create the next appointment
        if ($patient->getOriginal('appointment_recurrence') > 0) {
            
            $newAppointment = new Appointment;        
            $newAppointment->patient_id = $appointment->patient_id;

            //Add recurrence to date
            $appDate = new \Carbon\Carbon($appointment->appointment_date);
            $newAppDate = $appDate->addDay($patient->getOriginal('appointment_recurrence'));
            $newAppointment->appointment_date = $newAppDate;            
            $newAppointment->location = $appointment->location;            
            $newAppointment->save(); 
            $appointment->delete();
            return redirect('/appointments')->with('success','Appointment Record Deleted, Recurring Appointment Set');
        }

        $appointment->delete();
        return redirect('/appointments')->with('success','Appointment Record Deleted');
    }
}
