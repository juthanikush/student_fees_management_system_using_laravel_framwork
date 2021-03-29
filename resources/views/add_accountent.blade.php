@extends('layout')
@section('container')
<form method="post" action="{{route('accountent/add')}}">
@csrf
<input type="hidden" name="id" value="{{$id}}" class="form-control" required>
<div class="form-group">
    <label class="label">Name:</label>
    <input type="text" name="name" value="{{$name}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Password:</label>
    <input type="password" name="password" value="{{$password}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Email:</label>
    <input type="email" name="email" value="{{$email}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Address:</label>
    <textarea name="address"   class="form-control">{{$address}}</textarea>
</div>
<div class="form-group">
    <label class="label">Contact:</label>
    <input type="text" name="contact" value="{{$contact}}" class="form-control" required>
</div><br>
<button class="btn btn-success">Submit</button>
</form>


@endsection