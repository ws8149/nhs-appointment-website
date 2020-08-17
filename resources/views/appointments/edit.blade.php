@extends('layouts.app')
 
@section('content')
<!-- RESCHEDULING APPOINTEMNTS -->
<div class="container patientDetailContainer">
    <div class="card-header" style="font-size: 30px">
        <button class="btn float-left" role="button" style="background-color:  #005EB8;">
            <a href="javascript:history.back()" style="color: white"> Back </a>
        </button> 
        {{ $patient->forename}} 
    </div>   
    <form action="{{route('appointments.update', $appointment->id)}}" method="post">    
        {{ csrf_field() }} {{-- protect from csrf attacks --}}    
        {{ method_field('PATCH') }}
        <table id="hosptials_database" class ="table table-hover">               


        <tr>            
            <td>Previous Appointment Date:</td>            
            <td>{{ $appointment->appointment_date}}</td>
        </tr>          

        <tr>            
            <td>New Appointment Date:</td>            
            <td><input type="datetime-local" name="appointment_date"><br></td>
        </tr>          

        <tr>
            <td>Location:</td>
            <td><input type="text" name="location" value = "{{ $appointment->location}}"><br></td>
        </tr>                            
        
        </table> 
        <div  class="card-footer">
            <input class="btn btn-light" type="submit" name="Submit_button" value="submit" 
            style="width:100px; border: grey inset 2px; background-color:  #005EB8; color: white">            
        </div>
    </form>
</div>      

@endsection
