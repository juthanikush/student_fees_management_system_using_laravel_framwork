<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<!-- CSS only -->
	<link rel="stylesheet" type="text/css" href="{{asset('style.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  @if(session()->has('ADMIN_LOGIN'))
    <a class="navbar-brand" href="{{url('admin/deshboad')}}">Navbar</a>
  @endif
  @if(session()->has('ADMIN_ACCOUNT'))
    <a class="navbar-brand" href="{{url('student/studashboard')}}">Navbar</a>
    
  @endif
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      @if(session()->has('ADMIN_ACCOUNT'))
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('student/studashboard')}}">Home</a>
        </li>
        @endif
      @if(session()->has('ADMIN_LOGIN'))
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="{{url('admin/deshboad')}}">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="{{url('account/add_account')}}">Add Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('account/index')}}">View Account</a>
        </li>
        @endif
        @if(session()->has('ADMIN_ACCOUNT'))
        <li class="nav-item">
          <a class="nav-link" href="{{url('student/add_account')}}">Add Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('student/index')}}">View Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('student/search')}}">Search Student</a>
        </li>
        @endif
        @if(session()->has('ADMIN_LOGIN'))
         <li class="nav-item">
          <a class="nav-link " href="{{url('admin/logout')}}">Logout</a>
        </li>
        @endif
        @if(session()->has('ADMIN_ACCOUNT'))
        <li class="nav-item">
          <a class="nav-link " href="{{url('student/duefees')}}">DueFees</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('account/logout')}}">Logout</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<div class="contaner" >
	<div class="blank">
        @section('container')
        @show
	</div>
</div>
<footer class="footer">
	<center><label class="label">Create By Kush Juthani</label></center>
</footer>
</body>
</html>