@extends('layouts.app')
 
@section('content')
<!-- PATIENT DETAIL PAGE -->
<div class="container patientDetailContainer">      
    <table id="patients_database" class ="table table-hover"  style="font-family: 'Open Sans', sans-serif;">
        <div class="card-header" >
                <button class="btn float-left" style="background-color: #005EB8;"><a href="javascript:history.back()" style="color: white">BACK</a> </button>
                <h1 style="font-family: 'Open Sans', sans-serif; font-size: 30px">{{$patient->forename}} {{$patient->surname}} 
                    <!-- show star rating of patient -->
                    @if ($patient->rating == 1 )
                        <a> <img src="{{asset('img/redstar.png')}}" width="30" height="30"> </a>
                    @elseif ($patient->rating == 2)
                        <a> <img src="{{asset('img/yellowstar.png')}}" width="30" height="30"> </a>
                    @else
                        <a> <img src="{{asset('img/greenstar.png')}}" width="30" height="30"> </a>
                    @endif
                </h3>
            </div>   
            <tr>  
                <td><label>ID</label></td>  
                <td>{{$patient->id}}</td>                        
            </tr>                        

            <tr>
                <td><label>Date of Birth</label></td>  
                <td>{{$patient->dob}}</td>                       
            </tr>
            <tr>
                <td><label>Sex</label></td>  
                <td>{{$patient->sex}}</td>
            </tr>
            <tr>
                <td><label>Diagnosis</label></td>  
                <td>{{$patient->diagnosis}}</td>
            </tr>
            <tr>
                <td><label>Transplant details</label></td>  
                <td>{{$patient->transplant_details}}</td>
            </tr>
            <tr>
                <td><label>Hospital/Carer/GP</label></td>  
                @if ($hospital != null)
                    <td><a href="{{route('hospitals.show', $patient->hospital_id) }}"> {{$hospital->name}} </a> </td>               
                @endif
            </tr>
            <tr>
                <td><label>E-mail</label></td>  
                <td>{{$patient->email}}</td>
            </tr>            

            <tr>
                <td><label>Appointment Recurrence</label></td>  
                <td> <a>                                                 
                    {{$patient->appointment_recurrence}} 
                    </a> 
                </td>    
            </tr>
            <tr>
                <td><label>Contact Method</label></td>  
                <td>{{$patient->contact_method}}</td>
            </tr>
            <tr>
                <td><a>Blood Test Results Date</a></td>  
                <td><a                
                    @if ($patient->bt_status == "Received")
                        style = "color:green"        {{-- If a patient has received their result, mark them green  --}}  
                    @elseif ( $patient->bt_status == "Unreceived" ) 
                        style = "color:red"          {{-- If a patient hasn't received their result, mark them red  --}}                            
                    @elseif ( $patient->bt_status == "Pending" ) 
                        style = "color:blue"         {{-- If a patient has results pending, mark them blue  --}}                            
                    @else
                        style = "color:black"        {{-- If a patient does not have a bt due or their bt has been reviewed, mark them black  --}}
                    @endif 
                    >
                    
                    {{$patient->bt_results_date}}</a>
                </td>
            </tr>
            <tr>
                <td><label>Blood Test Status</label></td>  
                <td>
                    @if ($patient->bt_status == "")
                        Not Received
                    @endif
                    {{$patient->bt_status}}                
                </td>
            </tr>
                    
            <tr>
                <td><label>Bloods Contact Number</label></td>  
                <td>{{$patient->bloods_contact_no}}</td>                       
            </tr>

            <tr>
                <td><label>Contact Number</label></td>  
                <td>{{$patient->contact_no}}</td>
            </tr>

            <tr>
                <td><label>Comments</label></td>  
                <td>{{$patient->comments}}</td>
            </tr>

        </table>
    <div class="card-footer">
        <button class="btn" role="button" style="background-color:  #005EB8;"><a href="{{ route('patients.edit', $patient->id)  }}" style="color: white"> Edit </a> </button>    
        <button  type="button"class="btn" data-toggle="modal" data-target="#exampleModal" style="background-color:  #005EB8; color: white">Delete</button> 
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Attention!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this patient?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <form class="delete" action="{{route('patients.destroy', $patient->id)}}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }} 
                <input class="btn btn-primary" type="submit" name="Submit_button" value="Yes" style="width:100px; ">
            </form>
        </div>
      </div>
    </div>
</div>

</body>
@endsection

