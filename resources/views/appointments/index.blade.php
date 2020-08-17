@extends('layouts.app')
 
@section('content')


<div class="card">
    <div class="card-header" style="font-weight:lighter; font-size:25px;"> Appointments </div>
    <div class="container patientDetailContainer">
        <table id="patients_database" class ="table table-hover " >
            <thead>
                <tr>
                    <th class="tableColumn">Day</th>   
                    <th class="tableColumn">Appointment Date</th>                   
                    <th class="tableColumn">Patient</th>                                                
                    <th class="tableColumn">Location</th>                                                                
                    <th class="tableColumn">Actions</th>                                                                                                                                                      
                </tr>                        
            </thead> 
            @foreach($appointments as $appointment)
            <tr> 
                {{-- Display the day of the appointment date --}}           
                <td> {{  date("D", strtotime( str_replace('/', '-', $appointment->appointment_date) ) ) }} </td>    
                <td 
                    {{-- If appointment has past, color it green --}}
                    @if (Carbon\Carbon::today() > $appointment->appointment_date )
                        style = "color:green"
                    {{-- If appointment is tomorrow, color it green --}}
                    @elseif (Carbon\Carbon::today()->addDay(1) == Carbon\Carbon::parse($appointment->appointment_date)->startOfDay() )
                        style = "color:red"
                    @endif 
                    > 
                    {{$appointment->appointment_date}} 
                </td>            
                <td><a href="{{route('patients.show',$appointment->patient_id)}}">                                       
                    {{$appointment->forename}} {{$appointment->surname}} 
                    </a> 
                </td>          
                <td> {{$appointment->location}}</td>    
                <td>                
                    <form class="delete" action="{{route('appointments.destroy', $appointment->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                        <input type="submit" value="Done">
                    </form> 
                    <a href="{{route('appointments.edit', $appointment->id)}}"> Reschedule </a>              
                </td>                    
            </tr>
            @endforeach                                 
        </table>
    </div>
    <div class="card-footer"> 
        <button class="btn" input type="submit" style="background-color:  #005EB8"><a href="{{route('appointments.create')}}" style="color: white"> Create Appointment </a></button>
    </div>

</div>

</body>
@endsection

@section('script')
<script>  
    $(document).ready(function(){  
            $('#patients_database').DataTable();  
    });  

    //show delete confirmation dialog upon submission
    $(".delete").on("submit", function(){
            return confirm("Are you sure?");
});
</script> 
@endsection