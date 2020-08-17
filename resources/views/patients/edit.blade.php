@extends('layouts.app')
 
@section('content')

<!-- EDIT PATIENT DETAILS PAGE -->
<div class="container patientDetailContainer">
    <div class="card-header" style="font-family: 'Open Sans', sans-serif; font-size: 25px; font-weight:lighter;">
        <button class="btn float-left" role="button" style="background-color:  #005EB8; color: white;"><a href="javascript:history.back()" style="color: white"> Back </a></button> {{ $patient->id}}
        <!-- <button class="btn pull-right" role="button" style="background-color:  #005EB8; color: white;"><a href="javascript:history.back()" style="color: white"> Back </a></button> {{ $patient->id}} -->
    </div>    
    <form action="{{route('patients.update', $patient->id)}}" method="post">    
        {{ csrf_field() }} {{-- protect from csrf attacks --}}    
        {{ method_field('PATCH') }}
        <table id="patients_database" class ="table table-hover" style="font-family: 'Open Sans', sans-serif;">
            <tr>
                <td>Forename:</td>
                <td><input type="text" name="forename" value = "{{ $patient->forename}}"><br></td>
            </tr>
            <tr>
                <td>Surname:</td>
                <td><input type="text" name="surname" value = "{{ $patient->surname }}"><br></td>
            </tr>
            <tr>
                <td>Date of Birth: </td>
                <td> <input type="date" class="form-control" name="dob" value = "{{ $patient->getOriginal('dob') }}"></td>
            </tr>
            <tr>
                <td>Sex: </td>            
                <td> 
                    <select input type="text" name="sex" class="form-control" placeholder="" >
                        <option selected>{{ $patient->sex }}</option>
                        <option>M</option>
                        <option>F</option>                        
                        <option>N</option>                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Diagnosis: </td>
                <td><input type="text" name="diagnosis" value = "{{ $patient->diagnosis }}"><br></td>
            </tr>
            <tr>
                <td> Transplant Details: </td>
                <td><input type="text" name="transplant_details" value = "{{ $patient->transplant_details }}"><br></td>
            </tr>
            <tr>
                <td>Hospital/Carer/Gp: </td>
                <td> 
                    <select input type="text" name="hospital_id" class="form-control" placeholder="" required>
                            {{-- Only display current hospital if patient has it --}}
                            @if ($currentHospital != null)
                                <option value="{{$currentHospital->id}}" selected>{{ $currentHospital->name }}</option>                              
                                <option>None</option>                            
                                @foreach ($hospitals as $hospital)
                                    <option value="{{$hospital->id}}">{{$hospital->name}}</option>   
                                @endforeach       
                            @else
                                <option>None</option>                            
                                @foreach ($hospitals as $hospital)
                                    <option value="{{$hospital->id}}">{{$hospital->name}}</option>   
                                @endforeach             
                            @endif
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" value = "{{ $patient->email }}"><br></td>
            </tr>                
            <tr>
                <td>Appointment Recurrence: </td>
                
                <td> 
                    <select input type="text" name="appointment_recurrence" class="form-control" placeholder="">
                            <option value = "{{$patient->getOriginal('appointment_recurrence')}} " selected>{{ $patient->appointment_recurrence }}</option>
                            <option value = "0">None</option>
                            <option value = "7">Weekly</option>
                            <option value = "14">Fortnightly</option>
                            <option value = "30">Monthly</option>  
                            <option value = "182">Biannually</option>  
                            <option value = "365">Yearly</option>  
                    </select>
            </td>
            </tr>
                <tr>
                    <td>Contact Method: </td>
                    <td>
                      <select input type="text" name="contact_method" class="form-control" placeholder="" >
                        <option selected>{{ $patient->contact_method }}</option>
                        <option>Phone</option>
                        <option>Email</option>
                    </select>
                </td>  
            </tr>
            <tr>
                <td>Blood Test Results Date: </td>
                <td> <input type="date" name="bt_results_date" class="form-control" value = "{{ $patient->getOriginal('bt_results_date') }}"><br>  </td>
            </tr>
            <tr>
                <td>Blood Test Status: </td>
                <td> 
                    <select input type="text" name="bt_status" class="form-control" placeholder="" >
                        <option selected>{{ $patient->bt_status }}</option>
                        <option>Received</option>
                        <option>Unreceived</option>
                        <option>Pending</option>
                        <option>Reviewed</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Bloods Contact Number: </td>
                <td><input type="text" name="bloods_contact_no" value = "{{ $patient->bloods_contact_no }}"><br>  </td>
            </tr>

            <tr>
                <td>Contact Number: </td>
                <td><input type="text" name="contact_no" value = "{{ $patient->contact_no }}"><br>  </td>
            </tr>
                
            <tr>
                <td>Comments: </td>
                <td><input type="text" name="comments" value = "{{ $patient->comments }}"><br>  </td>
            </tr>    

            <tr>
                <td>Rating: </td>
                
                <td> 
                    <select input type="text" name="rating" class="form-control" placeholder="" >
                            <option value = "{{$patient->rating}}" selected>                                                                                                            
                                @if($patient->rating == 1) 
                                    Red Star
                                @elseif($patient->rating == 2) 
                                    Yellow Star
                                @elseif($patient->rating == 3) 
                                    Green Star
                                @endif                        
                                                                    
                                </option>
                            <option value = "1">Red Star</option>
                            <option value = "2">Yellow Star</option>
                            <option value = "3">Green Star</option>                      
                    </select>
                </td>
            </tr>

            </table> 
                <div class="card-footer"> 
                    <button class="btn" role="button" style="background-color:  #005EB8;  padding: 5px 12px;
                            font-size: 15px;font-family: 'Open Sans', sans-serif;">
                        <input class="btn" type="submit" name="Submit_button" value="Submit" style="color: white">
                    </button>
                </div>
        </form>
</div>    

@endsection
