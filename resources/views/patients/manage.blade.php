@extends('layouts.app')
 
@section('content')


<div class="container patientDetailContainer">
<table id="patients_database" class ="table table-hover " >
        <thead>
            <tr>
                <th class="tableColumn">ID</th>
                <th class="tableColumn">Name</th>                
                <th class="tableColumn">Local Hospital</th>                       
                <th class="tableColumn">Contact Method</th>   
                <th class="tableColumn">Day</th>   
                <th class="tableColumn">Appointment Date</th>    
                <th class="tableColumn">Actions </th>                                                                      
            </tr>                        
        </thead> 
        
        @foreach($patients as $patient)
        <tr> <a href="/seg-steakoverflow/public/patients/{{$patient->id}}">
            <td> {{$patient->id}}</td>
            <td><a href="/seg-steakoverflow/public/patients/{{$patient->id}}"
                    
                  @if ( strcmp($patient->bt_status, 'reviewed' ) == 0 || !isset($patient->bt_status ) )
                        style = "color:black"        {{-- If a patient does not have a bt due or their bt has been reviewed, mark them black  --}}
                  @elseif (strcmp($patient->bt_status, 'received' ) == 0)
                        style = "color:green"        {{-- If a patient has received their result, mark them green  --}}  
                  @elseif ( $patient->bt_results_date < now() ) 
                        style = "color:red"          {{-- If a patient hasn't received their result, mark them red  --}}        
                  
                  @endif
                 >                
                    {{$patient->forename}} {{$patient->surname}} 
                </a> 
            </td>            
            <td>{{$patient->surgery_hospital}}</td>                    
            <td>{{$patient->contact_method}}</td>

            {{-- Display the day of the appointment date --}}           
            <td> {{  date("D", strtotime( str_replace('/', '-', $patient->appointment_date) ) ) }} </td>    

            <td>{{$patient->appointment_date}} </td>    
            <td> 
                <Button> <a href="/seg-steakoverflow/public/patients/{{$patient->id}}"> View </a> </Button>                  
                <Button> <a href="/seg-steakoverflow/public/patients/{{$patient->id}}/edit"> Edit </a> </Button>                                  
                {{-- Construct delete button --}}                
                <form class="delete" action="{{route('patients.destroy', $patient->id)}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }}
                    <input type="submit" value="Delete">
                </form>            
            </td> 
        </tr>
        @endforeach                                 
        
    </table>
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