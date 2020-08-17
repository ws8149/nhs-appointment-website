<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class HospitalsController extends Controller
{

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
        $hospitals = Hospital::all();
        return view('hospitals.index')->with('hospitals', $hospitals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hospitals.create');
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
            'name' => 'required',            
        ]);
                        
        //create hospital model        
        $hospital = new Hospital;
        $hospital->id = $request->input('id');
        $hospital->name = $request->input('name');
        $hospital->address = $request->input('address');
        $hospital->contact_no = $request->input('contact_no');
        $hospital->email = $request->input('email');
        $hospital->type = $request->input('type');
        $hospital->comments = $request->input('comments');
        
        //save and redirect
        $hospital->save();
        return redirect('/hospitals')->with('success','Hospital Record Created');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitals.show')->with('hospital', $hospital);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = Hospital::find($id);
        return view('hospitals.edit')->with('hospital', $hospital);
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
                                       
        //find hospital
        $hospital = Hospital::find($id);
        $hospital->name = $request->input('name');
        $hospital->address = $request->input('address');
        $hospital->contact_no = $request->input('contact_no');
        $hospital->email = $request->input('email');
        $hospital->type = $request->input('type');
        $hospital->comments = $request->input('comments');
        
        //save and redirect
        $hospital->save();
        return redirect('/hospitals')->with('success','Hospital Record Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        $hospital->delete();
        return redirect('/hospitals')->with('success','Hospital Record Deleted');
    }
}

