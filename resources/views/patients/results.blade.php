@extends('layouts.app')
 
@section('content')
<!-- RESULTS PAGE -->
<div class="card" style="width: 100%; margin: 0; padding: 0;">
    <div class="card-header" style="font-family: 'Open Sans', sans-serif; font-size: 25px; font-weight:lighter;">Results</div>
    <div class="container patientDetailContainer">
        <table id="patients_database" class ="table table-hover">
            <thead>
                <tr>
                    <th class="tableColumn">ID</th>
                    <th class="tableColumn">Name</th>                
                    <th class="tableColumn">Local Hospital</th>                       
                    <th class="tableColumn">Contact Method</th>                   
                    <th class="tableColumn">Blood Test Results Date</th>    
                    <th class="tableColumn" style="border-right: 6px solid #005EB8; border-right-width: 2px;">Blood Test Results Status</th>                                                                                     
                </tr>                        
            </thead> 
            
            @foreach($patients as $patient)
            <tr> 
                <td> {{$patient->id}} </td>
                <td ><a href="{{route('patients.show',$patient->id)}}" > 
                    {{$patient->forename}} {{$patient->surname}}
                    </a>
                </td>            
                    
                <td ><a href="{{route('hospitals.show', $patient->hospital_id)}}" > 
                    {{$patient->hospital_name}}
                    </a>
                </td>            
                <td>{{$patient->contact_method}}</td>
                <td>{{$patient->bt_results_date}}</td>    
                <td @if ($patient->bt_status == "Received")
                        style = "color:green"        
                    @elseif ( $patient->bt_status == "Unreceived" ) 
                        style = "color:red"          
                    @elseif ( $patient->bt_status == "Pending" ) 
                        style = "color:blue"         
                    @else   
                        style = "color:black"        {{-- If a patient does not have a bt due or their bt has been reviewed, mark them black  --}}
                    @endif>
                        {{$patient->bt_status}} 
                </td>                                    
            </tr>
            @endforeach                                 
        </table>
    </div>
    <div class="card-footer" style="color: transparent">H</div> 
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