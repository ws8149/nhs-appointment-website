<!-- NAVBAR TEMPLATE FOR EVERY PAGE -->
{{-- First Nav Bar --}}
<nav id="firstnav" class="navbar navbar-light navbar-inverse fixed-top" style="background-color:white;">
    <a href="{{route('home')}}" class="pull-left"><img src="{{asset('img/nhs.jpg')}}" width="100" height="40" ></a>
  <a class="nav-link" href="{{ route('home') }}" style="font-family: 'Open Sans', sans-serif; color:#005EB8; font-size: 35px; text-align: center; left: 30px;"> BLOOD TEST DIARY</a>
        
        {{-- In case a search bar is to be implemented in the future --}}
        <div class="searchbar" style="visibility: hidden;">
            <form class="form-inline">
              <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search" >
              <button class="fa fa-search my-2 my-sm-0" aria-hidden="true" href="#"></button>
            </form>
        </div>
</nav>

{{-- Second Nav Bar --}}
<nav id="secondnav" class="navbar navbar-light navbar-inverse fixed-top" style="background-color: #005EB8;">
  <a href="{{route('patients.create')}}" class="nav-link"><i class="fa fa-edit"></i> DATA ENTRY</a>
  <a href="{{route('patients.index')}}" class="nav-link"><i class="fa fa-users"></i> PATIENTS</a>
  <a href="{{route('hospitals.index')}}" class="nav-link"><i class="fas fa-hospital-alt"></i> INFO</a> 
  <a href="{{route('patients.results')}}" class="nav-link"><i class="fas fa-poll-h"></i> RESULTS</a>
  <a href="{{route('appointments.index')}}" class="nav-link"><i class="fa fa-calendar"></i> APPOINTMENTS</a>

  <div class="dropdown show" style="margin-right:10vh;">
    <a class="btn btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cog"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="{{ route('users.show', \Auth::user()->id ) }}" style="color:black;"><i class="fa fa-user"></i>     My Profile</a>
      <a class="dropdown-item" href="{{ route('faq') }}" style="color:black;"><i class="fa fa-question-circle"></i>    FAQ</a>
      <a class="dropdown-item" href="{{ route('users.index') }}" style="color:black;"><i class="fas fa-user-friends"></i> Users</a>
      <a class="dropdown-item" href="{{ route('tutorial') }}" style="color:black;"><i class="fa fa-desktop"></i>   Tutorials</a>

      <a class="dropdown-item" href="{{ route('logout') }}" style="color:black;"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Log Out</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </div>
  </div>  
</nav>

