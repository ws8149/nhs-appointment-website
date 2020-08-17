@extends('layouts.app')
 
@section('content')
<!-- HOSPITAL/CARER/GP DETAILS PAGE -->
 <div class="container patientDetailContainer">  
    <table id="hospitals_database" class ="table table-hover"  style="font-family: 'Open Sans', sans-serif;">
        <div class="card-header" style="font-weight:lighter; font-size:25px; font-family: 'Open Sans', sans-serif; color: #005EB8; text-align: centre">
            <button class="btn float-left" style="background-color: #005EB8;"><a href="javascript:history.back()" style="color: white">BACK</a></button>     
                @if ($hospital ->type == "Hospital" )
                HOSPITAL DETAILS
                @elseif ($hospital->type == "Carer")
                 CARER DETAILS
                @else
                 GP DETAILS
                @endif
        </div>
        <tr>  
            <td><label>Hospital name</label></td>  
            <td>{{$hospital->name}}</td>                        
        </tr>                        
        <tr>
            <td><label>Hospital ID</label></td>  
            <td>{{$hospital->id}}</td>                       
        </tr>
        <tr>
            <td><label>Adress</label></td>  
            <td>{{$hospital->address}}</td>
        </tr>
        <tr>
            <td><label>Contact number</label></td>  
            <td>{{$hospital->contact_no}}</td>
        </tr>
        <tr>
            <td><label>Email</label></td>  
            <td>{{$hospital->email}}</td>
        </tr>
        <tr>
            <td><label>Type</label></td>  
            <td>{{$hospital->type}}</td>
        </tr>
        <tr>
            <td><label>Comments</label></td>  
            <td>{{$hospital->comments}}</td>
        </tr>
    </table>
    <div class="card-footer">
        <button class="btn" role="button" style="background-color:  #005EB8;"><a  href="{{route('hospitals.edit', $hospital->id)}}" style="color: white"> Edit </a> </button>    
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
                    Are you sure you want to delete this entry?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form class="delete" action="{{route('hospitals.destroy', $hospital->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }} 
                            <input class="btn btn-primary" type="submit" name="Submit_button" value="Yes" style="width:100px; ">
                    </form>
                </div>
            </div>
        </div>
</div>
@endsection
