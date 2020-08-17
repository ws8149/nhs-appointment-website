@extends('layouts.app')
 
@section('content')
<!-- LIST OF PATIENT PAGE -->
<div class="card">
    <div class="card-header" style="font-weight:lighter; font-size: 25px;">
        Patients
    </div>
    <div class="container" style="width:100%;">
      <!-- Nav pills changes list according to star rate of patient-->
      <ul class="nav nav-pills nav-fill" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#1star"><img src="{{asset('img/redstar.png')}}" width="30" height="30"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#2star"><img src="{{asset('img/yellowstar.png')}}" width="30" height="30"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#3star"><img src="{{asset('img/greenstar.png')}}" width="30" height="30"></a>
        </li>
      </ul>

    <!-- Tab panes -->
      <div class="tab-content">              
        <div id="1star" class="container tab-pane active"><br>
          <table id="patients_database1" style="font-family: 'Open Sans', sans-serif;" class ="table table-hover " >
            <thead>
              <tr>                          
                <th >Name</th>                                                                          
                <th >Age</th>                                                                          
              </tr>                        
            </thead> 
            @foreach($oneStarPatients as $patient)
              <tr>
                <td> 
                  <a href="{{route('patients.show', $patient->id)}}"> 
                    {{$patient->forename}} {{$patient->surname}} 
                  </a> 
                  
                </td>                      
                <td>
                    <a> {{$patient->age }} </a>
                </td>
              </tr>
            @endforeach                                                 
          </table>
        </div>
        <div id="2star" class="container tab-pane fade"><br>
          <table id="patients_database2" style="font-family: 'Open Sans', sans-serif;" class ="table table-hover " >
            <thead>
              <tr>                          
                <th>Name</th> 
                <th>Age</th>                                                                         
              </tr>                        
            </thead> 
                    
            @foreach($twoStarPatients as $patient)
              <tr>
                <td> 
                  <a href="{{route('patients.show', $patient->id)}}"> 
                    {{$patient->forename}} {{$patient->surname}} 
                  </a> 
                </td>    
                <td>
                    <a> {{$patient->age }} </a>
                </td>                  
              </tr>
            @endforeach                                                 
              </table>
        </div>
        <div id="3star" class="container tab-pane fade"><br>
            <table id="patients_database3" style="font-family: 'Open Sans', sans-serif;" class ="table table-hover" >
              <thead>
                <tr>                          
                  <th>Name</th>  
                  <th>Age</th>                                                                        
                </tr>                        
              </thead> 
                      
              @foreach($threeStarPatients as $patient)
                <tr>
                  <td> 
                    <a href="{{route('patients.show', $patient->id)}}"> 
                      {{$patient->forename}} {{$patient->surname}} 
                    </a> 
                  </td>     
                  <td>
                      <a> {{$patient->age }} </a>
                  </td>                 
                </tr>
              @endforeach                                                 
            </table>                      
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button class="btn" style="background-color:  #005EB8; color: white; "> <a href="{{route('patients.create')}}" style="color: white">Add patient </a></button>
    </div>
 </div>
@endsection

@section('script')
<script>  
$(document).ready(function(){  
        $('#patients_database1').DataTable();  
        $('#patients_database2').DataTable();  
        $('#patients_database3').DataTable();  
});  

</script> 
@endsection