@extends('layout')
@section('container')
<div class="show">
    <table class="table">
    <tr>
        <th class="label">ID</th>
        <th class="label">Name</th>
        <th class="label">Email</th>
        <th class="label">Address</th>
        <th class="label">Contact</th>
        <th class="label" colspan="2">Action</th>
    </tr>

    @foreach($data as $list)
  
    <tr>
        <th class="label">{{$list->id}}</th>
        <th class="label">{{$list->name}}</th>
        <th class="label">{{$list->email}}</th>
        <th class="label">{{$list->address}}</th>
        <th class="label">{{$list->contact}}</th>
        <th class="label"><a href="{{url('account/delete')}}/{{$list->id}}">Delete</a></th>
        <th class="label"><a href="{{url('account/add_account')}}/{{$list->id}}">Edit</a><th>
    </tr>
    @endforeach
    </table>
</div>


@endsection