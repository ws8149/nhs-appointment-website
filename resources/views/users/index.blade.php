@extends('layouts.app')
 
@section('content')


<div class="card">
  <div class="card-header"> List of admins </div>
  <div class="container patientDetailContainer">
    <table id="users_database" class ="table table-hover " >
        <thead>
            <tr>
                <th class="tableColumn">ID</th>
                <th class="tableColumn">Name</th>                
                <th class="tableColumn">Email</th>                     
            </tr>                        
        </thead> 
        
        @foreach($users as $users)
        <tr>
            <td>{{$users->id}}</td>
            <td>{{$users->name}}</td>            
            <td>{{$users->email}}</td>                                        
        </tr>
        @endforeach                                 
        
    </table>
  </div>
  <div class="card-footer">
    <button class="btn" style="background-color: #005EB8"><a href="{{route('users.create')}}" style="color: white"> Add user</a></button>
  </div>
</div>
    
</body>
@endsection

@section('script')

<style>
    .tableColumn{
        border-left: 6px solid #005EB8; 
        border-radius: 2%; 
        border-left-width: 2px;}
</style>
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
              
                <form class="delete" action="{{route('users.destroy', $users->id)}}" method="POST">
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
@endsection