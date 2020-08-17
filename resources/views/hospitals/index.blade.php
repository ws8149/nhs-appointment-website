@extends('layouts.app')
 
@section('content')

<!-- LIST OF HOSPITALS/GP/CARERS PAGE -->
<div class="card">
    <div class="card-header" style="font-weight:lighter; font-size:25px;">Hospital/GP/Carer info </div>
    <div class="container patientDetailContainer">
        <table id="hospitals_database" class ="table table-hover " >
            <thead>
                <tr>
                    <th class="tableColumn">ID</th>
                    <th class="tableColumn">Name</th>                
                    <th class="tableColumn">Address</th>                
                    <th class="tableColumn">Email</th>
                    <th class="tableColumn">Contact Number</th>                
                    <th class="tableColumn">Type</th>                                
                    <th class="tableColumn" style="border-right: 6px solid #005EB8; border-right-width: 2px;">Actions </th>                                                                
                </tr>                        
            </thead> 
                
            @foreach($hospitals as $hospital)
            <tr>
                <td>{{$hospital->id}}</td>
                <td><a href="{{route('hospitals.show', $hospital->id) }}"> {{$hospital->name}}</a></td>            
                <td>{{$hospital->address}}</td>                
                <td>{{$hospital->email}}</td>      
                <td>{{$hospital->contact_no}}</td>                
                <td>{{$hospital->type}}</td>                            
                <td>                                
                    {{-- Construct delete button --}}                                
                    <form class="delete" action="{{route('hospitals.destroy', $hospital->id)}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <input type="submit" value="Delete">
                    </form>            
                </td>
            </tr>
            @endforeach                                 
                
            </table>
            
        </div>
        <div class="card-footer"> 
            <button class="btn" input type="submit" style="background-color:  #005EB8; color: white;">
                <a href="{{route('hospitals.create')}}" style="color: white"> Add Hospital/GP/Carer </a>
            </button>
        </div>
</div>
</body>
@endsection

@section('script')
<script>  
    $(document).ready(function(){  
            $('#hospitals_database').DataTable();  
    });  

    //show delete confirmation dialog upon submission
    $(".delete").on("submit", function(){
            return confirm("Are you sure?");
    });
</script> 
@endsection