
<!-- New Section -->
@extends('layouts.app')
 
@section('content')
<!-- ADMIN DETAILS PAGE -->
<div class="container userDetailContainer">      
  <table id="users_database" class ="table table-hover"  style="font-family: 'Open Sans', sans-serif;">
    <div class="card-header">            
      <h3 style="font-family: 'Open Sans', sans-serif;">{{$user->name}} </h3>
    </div>
    <tr>  
        <td><label>ID</label></td>  
        <td>{{$user->id}}</td>                        
    </tr>  
    <tr>  
        <td><label>NAME</label></td>  
        <td>{{$user->name}}</td>                        
    </tr>  
    <tr>  
        <td><label>CREATED AT</label></td>  
        <td>{{$user->created_at}}</td>                        
    </tr>  
    <tr>  
        <td><label>UPDATED AT</label></td>  
        <td>{{$user->updated_at}}</td>                        
    </tr>  
  </table>
  <div class="card-footer">
      <a class="btn btn-light float-left" href="{{ route('users.edit', $user->id)  }}" role="button" style="border: grey; color:white; background-color:#005EB8;" > Edit </a>     
        <button class="btn" role="button" style="background-color: #005EB8;"> <a href="{{route('users.create')}}" style="color:white;" > Add new admin </a> </button> 
        <button  type="button"class="btn float-right" style="border: grey; color:white; background-color:#005EB8;"  data-toggle="modal" data-target="#exampleModal">Delete</button> 
  </div>
      {{-- Modal window --}}
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
              Are you sure you want to delete this account?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form class="delete" action="{{route('users.destroy', $user->id)}}" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                    {{ csrf_field() }} 
                  <input class="btn btn-primary" type="submit" name="Submit_button" value="Yes" style="width:100px; ">
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


</body>
@endsection


