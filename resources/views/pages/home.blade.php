@extends('layouts.home-page-app') 
@section('content')
<!-- HOME PAGE LAYOUT -->
<div class="container-login" style="background-image: url('{{asset('img/nhsbg1.jpg') }} '); margin-top:15vh; position:fixed;">	
	<button class="myButton" style="position:absolute; right:30px; top:70vh;">
		<a href="{{route('tutorial')}}" style="color: white"> VIDEO INSTRUCTION </a> 
	</button>
</div>
@endsection