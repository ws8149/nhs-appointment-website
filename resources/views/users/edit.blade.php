
<!-- New section -->
@extends('layouts.app')
 
@section('content')
<!-- EDIT ADMIN PAGE -->
    <div class="card-header" style="font-size: 25px; font-weight:lighter;">
        <button class="btn float-left" role="button" style="background-color:  #005EB8; color: white;"><a href="javascript:history.back()" style="color: white"> Back </a></button> 
         {{ $user->name}}
    </div> 
    <div class="container userDetailContainer">
        <form action="{{route('users.update', $user->id)}}" method="post">    
            {{ csrf_field() }} {{-- protect from csrf attacks --}}    
            {{ method_field('PATCH') }}
            <table id="patients_database" class ="table table-hover" style="font-family: 'Open Sans', sans-serif;">
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" value = "{{ $user->name}}"><br></td>

                </tr>
                <tr>
                    <td>ID:</td>
                    <td><input type="text" name="id" value = "{{ $user->id}}"><br></td>

                </tr>
                
                
                <tr>
                    <td>Email: </td>
                    <td><input type="text" name="email" value = "{{ $user->email }}"><br></td>
                </tr>
                <tr>
                    <td>Created at: </td>
                    <td>{{$user->created_at}}<br></td>
                </tr>
                <tr>
                    <td>Updated at: </td>
                    <td>{{$user->updated_at}}<br></td>
                </tr>
                

            </table> 
    </div>
            <div class="card-footer"> 
        <button class="btn pull-left" role="button" >
            <input class="btn btn-primary pull-right" style="color:white; background-color:#005EB8;" type="submit"  value="Save">
        </button>
    </div> 
        </form>
 

@endsection

