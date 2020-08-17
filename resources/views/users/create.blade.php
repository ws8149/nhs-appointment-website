@extends('layouts.app')

@section('content')
<!-- ADMIN ENTRY PAGE -->
<div class="card">
    <div class="card-header">
        <div class="dropdown show" style="margin-right:10vh; font-size:25px; font-weight:lighter;">
            <a class="btn btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                ADMIN
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('patients.create')}}" style="color:black;">PATIENT</a>
                <a class="dropdown-item" href="{{route('hospitals.create')}}" style="color:black;">HOSPITAL/GP/CARER</a>
                <a class="dropdown-item" href="{{route('users.create')}}" style="color:black;">ADMIN</a>                                                         
            </div>INFORMATION ENTRY
        </div>   
    </div>
    <div class="container">        
        <form action="{{route('register')}}" method="post">
            {{ csrf_field() }} {{-- protect from csrf attacks --}}    
        <div class="form-group">
            <label>Name</label>
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
        </div>

        <div class="form-group">
            <label>Email</label>
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
        </div>

        <div class="form-group">
            <label>Password</label>
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>Please ensure your password is 8 characters long and has a special character like !,@ etc.</strong>
            </span>
                @endif
        </div>

        <div class="form-group">
            <label>Confirm password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>                    <!-- End of the section -->
        <div class="card-footer " style="text-align:center; left: 0; bottom: 0; width: 100%;">       
            <button class="btn" input type="submit" style="background-color:  #005EB8; color: white;"> Submit </button>
        </div>
        </form>
    </div>
</div>



    

@endsection
