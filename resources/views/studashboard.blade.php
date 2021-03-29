@extends('layout')
@section('container')
    <div class="welcome">
        <center><h1>Welcome ACCOUNTENT</h1></center>
    <div>
    @if(session()->has('message'))
    <label style="font-size:30px;color:black;">{{session('message')}}</label>
    @endif
    
@endsection