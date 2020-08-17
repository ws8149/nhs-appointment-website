@extends('layouts.app')
 
@section('content')
<!-- PATIENT ENTRY -->
<div class="card">
    <div class="card-header">
        <div class="dropdown show" style="margin-right:10vh; font-size:25px; font-weight:lighter;">
            <a class="btn btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                PATIENT
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('patients.create')}}" style="color:black;">PATIENT</a>
                <a class="dropdown-item" href="{{route('hospitals.create')}}" style="color:black;">HOSPITAL/GP/CARER</a>
                <a class="dropdown-item" href="{{route('users.create')}}" style="color:black;">ADMIN</a>                                                         
            </div>INFORMATION ENTRY
        </div>
    </div>

    <div class="container">        
        <form action="{{route('patients.store')}}" method="post">
            {{ csrf_field() }} {{-- protect from csrf attacks --}}    
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" required
                    name="id" value = "{{ old('id') }}">
            </div>
                        
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control"  required
                    name="forename" value = "{{ old('forename') }}">
            </div>

            <div class="form-group">
                <label>Surname</label>
                <input type="text" class="form-control"  required
                    name="surname" value = "{{ old('surname') }}">
            </div>

            <div class="form-group">
                <label>Date of Birth (DD/MM/YYYY) </label>
                <input type="date" class="form-control"  required
                    name="dob" value = "{{ old('dob') }}">
            </div>                    

            <div class="form-group">
                <label>Sex</label>
                <select class="form-control"  required name="sex">
                    <option selected>{{old('sex')}}</option>
                    <option>M</option>
                    <option>F</option>
                </select>
            </div>

            <div class="form-group">
                <label>Diagnosis</label>
                <input type="text" class="form-control"  
                    name="diagnosis" value = "{{ old('diagnosis') }}">
            </div>
                        
            <div class="form-group">
                <label>Transplant details</label>
                <input type="text" class="form-control"  
                    name="transplant_details" value = "{{ old('transplant_details') }}">
            </div>

            <div class="form-group">
                <label>Hospital/Carer/GP</label>
                <select class="form-control"  name="hospital_id">
                    <option selected>{{ old('hospital_id') }}</option>
                    <option>None</option>                            
                    @foreach ($hospitals as $hospital)
                        <option value="{{$hospital->id}}">{{$hospital->name}}</option>   
                    @endforeach                         
                </select>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control"  
                    name="email" value = "{{ old('email') }}">                        
            </div>
            <div class="form-group">
                <label>Appointment Recurrence</label>
                <select class="form-control"  name="appointment_recurrence">
                    <option selected>{{ old('appointment_recurrence') }}</option>
                    <option value = "0">None</option>
                    <option value = "7">Weekly</option>
                    <option value = "14">Fortnightly</option>
                    <option value = "30">Monthly</option>  
                    <option value = "182">Biannually</option>  
                    <option value = "365">Yearly</option>                                  
                </select>
            </div>
                        
            <div class="form-group">
                <label>Contact Method</label>
                <select class="form-control"  name="contact_method">
                    <option selected>{{ old('contact_method') }}</option>
                    <option>None</option>
                    <option>Email</option>
                    <option>Phone</option>                            
                </select>
            </div>

            <div class="form-group">
                <label>Blood Test Results Date</label>
                <input type="date" class="form-control"  
                        name="bt_results_date" value = "{{ old('bt_results_date') }}">                        
            </div>

            <div class="form-group">
                <label>Blood Test Status</label>
                    <select class="form-control"  name="bt_status">
                        <option selected>{{ old('bt_status') }}</option>
                        <option>None</option>
                        <option>Pending</option>                            
                        <option>Received</option>
                        <option>Reviewed</option>                            
                    </select>
            </div>
                        
            <div class="form-group">
                <label>Bloods Contact No</label>
                <input type="text" class="form-control"  
                    name="bloods_contact_no" value = "{{ old('bloods_contact_no') }}">                        
            </div>

            <div class="form-group">
                <label>Contact No</label>
                <input type="text" class="form-control"  
                        name="contact_no" value = "{{ old('contact_no') }}">                        
            </div>

            <div class="form-group">
                <label>Rating</label>
                <select class="form-control"  name="rating" required>
                    <option selected>{{ old('rating') }}</option>
                    <option value = "1">Red Star</option>
                    <option value = "2">Yellow Star</option>
                    <option value = "3">Green Star</option>                            
                </select>
            </div>

            <div class="form-group">
                <label>Comments</label>
                <input type="text" class="form-control"  
                    name="comments" value = "{{ old('comments') }}">  
            </div> 
    </div>
            <div class="card-footer text-muted" style="text-align:center; left: 0; bottom: 0; width: 100%;">       
                <button class="btn" input type="submit" style="background-color:  #005EB8; color: white;"> Submit </button>
            </div>
        </form>
</div>



    

@endsection