<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Hospital;
use App\Appointment;
use Carbon\Carbon;
use DB;

class PatientsController extends Controller
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
        $oneStarPatients = Patient::select('id', 'forename','surname', 'dob')->where('rating', 1)->get();
        $twoStarPatients = Patient::select('id', 'forename','surname', 'dob')->where('rating', 2)->get();
        $threeStarPatients = Patient::select('id', 'forename','surname', 'dob')->where('rating', 3)->get();       
        
        return view('patients.index')->with(compact('oneStarPatients','twoStarPatients','threeStarPatients')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $hospitals = Hospital::all();              ;
        return view('patients.create')->with('hospitals', $hospitals);
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
            'id' => 'required',
            'dob' => 'required',                        
            'email' => 'email|nullable',                                 
        ]);                        
        

        //create model
        $patient = new Patient;
        $patient->id = $request->input('id');
        $patient->forename = $request->input('forename');
        $patient->surname = $request->input('surname');        
        $patient->dob = $request->input('dob');
        $patient->sex = $request->input('sex');
        $patient->diagnosis = $request->input('diagnosis');
        $patient->transplant_details = $request->input('transplant_details');
        $patient->hospital_id = $request->input('hospital_id');
        $patient->email = $request->input('email');        
        $patient->appointment_recurrence = $request->input('appointment_recurrence');
        $patient->contact_method = $request->input('contact_method');        
        $patient->bt_results_date = $request->input('bt_results_date');
        $patient->bt_status = $request->input('bt_status');        
        $patient->bloods_contact_no = $request->input('bloods_contact_no');        
        $patient->contact_no = $request->input('contact_no');                        
        $patient->rating = $request->input('rating');
        $patient->comments = $request->input('comments');
        
        //save and redirect
        $patient->save();        
        return redirect('/patients')->with('success','Patient Record Created');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $patient = Patient::find($id);                
        $hospital = Hospital::find($patient->hospital_id);                
        
        return view('patients.show')->with(compact('patient','hospital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //All hospitals that is to be displayed in the drop down 
        $hospitals = Hospital::all();              ;                
        
        $patient = Patient::find($id);        
        
        //The patient's current hospital
        $currentHospital = Hospital::find($patient->hospital_id);                
        return view('patients.edit')->with(compact('patient','hospitals','currentHospital'));


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
        //Validate input
        $this->validate($request, [            
            'dob' => 'required',            
            'email' => 'email',
            
        ]);                                        
               
        //Find and update model
        $patient = Patient::find($id);        
        $patient->forename = $request->input('forename');
        $patient->surname = $request->input('surname');                
        $patient->dob = $request->input('dob');
        $patient->sex = $request->input('sex');
        $patient->diagnosis = $request->input('diagnosis');
        $patient->transplant_details = $request->input('transplant_details');
        $patient->hospital_id = $request->input('hospital_id');
        $patient->email = $request->input('email');                
        $patient->appointment_recurrence = $request->input('appointment_recurrence');        
        $patient->contact_method = $request->input('contact_method');
        $patient->bt_results_date = $request->input('bt_results_date');
        $patient->bt_status = $request->input('bt_status');
        $patient->bloods_contact_no = $request->input('bloods_contact_no');        
        $patient->contact_no = $request->input('contact_no');                        
        $patient->rating = $request->input('rating');
        $patient->comments = $request->input('comments');
        
        //Save and redirect
        $patient->save();        
        return redirect('/patients/' . $patient->id)->with('success','Patient Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);        

        //If patient has an appointment, remove them
        $appointment = Appointment::where('patient_id', '=', $id);        
        if ($appointment != null) {
            $appointment->delete();
        }

        $patient->delete();
        return redirect('/patients')->with('success','Patient Record Deleted');
    }


    /**
     * Display a listing of the resource for patient's blood test results.
     *
     * @return \Illuminate\Http\Response
     */   
    public function results()
    {       
        $patients = DB::table('patients')
        ->join('hospitals', 'patients.hospital_id', '=', 'hospitals.id')
        ->select('patients.*', 'hospitals.name AS hospital_name')
        ->where('bt_results_date', '>', 1)
        ->get(); 

        return view('patients.results')->with('patients', $patients); 
    }
}

