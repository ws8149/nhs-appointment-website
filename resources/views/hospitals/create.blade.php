@extends('layouts.app')
 
@section('content')
<!-- HOSPITAL ENTRY FORM -->
<div class="card">
    <div class="card-header">
        <div class="dropdown show" style="margin-right:10vh; font-size:25px; font-weight:lighter;">
            <a class="btn btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                HOSPITAL/GP/CARER
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('patients.create')}}" style="color:black;">PATIENT</a>
                <a class="dropdown-item" href="{{route('hospitals.create')}}" style="color:black;">HOSPITAL/GP/CARER</a>
                <a class="dropdown-item" href="{{route('users.create')}}" style="color:black;">ADMIN</a>                                                         
            </div> INFORMATION ENTRY
        </div>
    </div>

    <div class="container">        
        <form action="{{route('hospitals.store')}}" method="post">
            {{ csrf_field() }} {{-- protect from csrf attacks --}}    
            <div class="form-group">
                <label>ID</label>
                <input type="text" class="form-control" name="id" value = "{{ old('id') }}">
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value = "{{ old('name') }}">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value = "{{ old('address') }}">
            </div>

            <div class="form-group">
                <label>Contact Number </label>
                <input type="text" class="form-control"name="contact_no" value = "{{ old('contact_no') }}">
            </div>                    

            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type">
                    <option selected>{{old('type')}}</option>
                    <option>Hospital</option>
                    <option>Carer</option>
                    <option>GP</option>
                </select>
            </div>
                                        
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value = "{{ old('email') }}">                        
            </div>
                        
            <div class="form-group">
                <label>Comments</label>
                <input type="text" class="form-control" 
                    name="comments" value = "{{ old('comments') }}">                        
            </div>
        </div>
        <div class="card-footer">       
            <button class="btn" input type="submit" style="background-color:  #005EB8; color: white;"> Submit </button>
        </div>
    </form>
</div>
@endsection
