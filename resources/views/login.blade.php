@extends('layout')
@section('container')
	<div class="row"> 
		<div class="col-sm-6">
			<h1>Admin  Login</h1>
           
		    <form action ="{{route('admin/login')}}" method = "post">
                @csrf
                <label class="label">UserName  :</label><input type = "text" name ="aname" class = "box"/><br /><br />
                <label class="label">Password  :</label><input type = "password" name ="apass" class = "box" /><br/><br />
                
                @if(session()->has('error'))
                <label class="label">{{session('error')}}</label>
                @endif
                <input type = "submit" value = "Submit" name="submit" class="btn btn-primary"/><br />
		    </form>
           
		</div>
		<div class="col-sm-6">
			<h1>Account  Login</h1>
		    <form action = "{{route('student/login')}}" method = "post">
			@csrf
		    <label class="label">UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
		    <label class="label">Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
			@if(session()->has('errorr'))
                <label class="label">{{session('errorr')}}</label>
                @endif
		    <input type = "submit" class="btn btn-success" value = " Submit "/><br />
		    </form>
		</div>
	</div>
 @endsection