@extends('layout')
@section('container')
<form method="post" action="{{route('student/add')}}">
@csrf
<input type="hidden" name="id" value="{{$id}}" class="form-control" required>
<div class="form-group">
    <label class="label">Name:</label>
    <input type="text" name="name" value="{{$name}}" class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Email:</label>
    <input type="text" name="email" value="{{$email}}"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Gender:</label><br>
    @if($gender=="male")
        <input type="radio" name="gender" value="male" checked><label class="label">Male</label>
        <input type="radio" name="gender" value="female"><label class="label">Female</label>    
    
    @elseif($gender=="female")
        <input type="radio" name="gender" value="male"><label class="label">Male</label>
        <input type="radio" name="gender" value="female" checked><label class="label">Female</label>
    @else
        <input type="radio" name="gender" value="male"><label class="label">Male</label>
        <input type="radio" name="gender" value="female"><label class="label">Female</label>
    
    @endif
   
</div>
<div class="form-group">
    <label class="label">Course:</label>
    <input type="text" name="course" value="{{$course}}"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Fees:</label>
    <input type="text" name="fees" value="{{$fees}}"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Paid:</label>
    <input type="text" name="paid" value="{{$paid}}"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Due:</label>
    <input type="text" name="duefees" value="{{$duefees}}"  class="form-control" required>
</div>
<div class="form-group">
    <label class="label">Address:</label>
    <textarea name="address"   class="form-control">{{$address}}</textarea>
</div>
<div class="form-group">
    <label class="label">Contact:</label>
    <input type="text" name="contact_us" value="{{$contact_us}}"  class="form-control" required>
</div><br>
<button class="btn btn-success">Submit</button>
</form>


@endsection