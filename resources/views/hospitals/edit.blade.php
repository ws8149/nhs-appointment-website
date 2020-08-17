@extends('layouts.app')
 
@section('content')
<!-- EDIT HOSPITAL/GP/CARER PAGE -->
<div class="container patientDetailContainer">
    <div class="card-header" style="font-size: 30px">
        <button class="btn float-left" role="button" style="background-color:  #005EB8;">
            <a href="javascript:history.back()" style="color: white"> Back </a>
        </button> {{ $hospital->id}} 
    </div>   
    <form action="{{route('hospitals.update', $hospital->id)}}" method="post">    
        {{ csrf_field() }} {{-- protect from csrf attacks --}}    
        {{ method_field('PATCH') }}
        <table id="hosptials_database" class ="table table-hover">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" value = "{{ $hospital->name}}"><br></td>
            </tr>        

            <tr>
                <td>Address:</td>
                <td><input type="text" name="address" value = "{{ $hospital->address}}"><br></td>
            </tr>        

            <tr>
                <td>Contact Number:</td>
                <td><input type="text" name="contact_no" value = "{{ $hospital->contact_no}}"><br></td>
            </tr>        

            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" value = "{{ $hospital->email}}"><br></td>
            </tr>        

            <tr>
                <td>Type: </td>            
                <td> 
                    <select input type="text" name="type" class="form-control" placeholder="" required>
                            <option selected>{{ $hospital->type }}</option>
                            <option>Hospital</option>
                            <option>Carer</option>                        
                            <option>GP</option>                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Comments:</td>
                <td><input type="text" name="comments" value = "{{ $hospital->comments}}"><br></td>
            </tr>        
        </table> 
        <div  class="card-footer">
            <input class="btn btn-light" type="submit" name="Submit_button" value="submit" style="width:100px; border: grey inset 2px; background-color:  #005EB8; color: white">            
        </div>
    </form>
</div>      
@endsection
