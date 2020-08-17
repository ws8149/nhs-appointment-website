@extends('layouts.app')
 
@section('content')

<!-- PAGE TO CREATE AN APPOINTMENT  -->
<div class="card">
    <div class="card-header">        
             CREATE AN APPOINTMENT         
    </div>

    <div class="container">        
        <form action="{{route('appointments.store')}}" method="post">
            {{ csrf_field() }} {{-- protect from csrf attacks --}}              
            
            <div class="form-group">
                <label>Patient</label>
                <select class="form-control"  name="patient_id">                                                          
                    @foreach ($patients as $patient)
                        <option value="{{$patient->id}}">{{$patient->forename}} {{$patient->surname}}</option>   
                    @endforeach                         
                </select>
            </div>

            <div class="form-group">
                <label>Appointment Date</label>
                <input type="datetime-local" class="form-control"  
                        name="appointment_date" value = "{{ old('appointment_date') }}">                        
            </div>

            <div class="form-group">
                <label>Location</label>
                <input type="text" class="form-control" required
                    name="location" value = "{{ old('location') }}">
            </div>   
                        
    </div>
            <div class="card-footer">       
                <button class="btn" input type="submit" style="background-color:  #005EB8; color: white;"> Submit </button>
            </div>
        </form>
</div>



    

@endsection