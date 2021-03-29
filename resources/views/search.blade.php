@extends('layout')
@section('container')
<form method="post" action="{{route('student/search')}}">
@csrf

<div class="form-group">
    <label class="label">Search:</label>
    <input type="text" name="search"  class="form-control" required>
</div><br><Br>
<button class="btn btn-success">Submit</button>
</form>

@endsection