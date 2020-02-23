@extends('admin/layout/admin_app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
    <div class="text-center">
    </div>
    <h4>Add Employee</h4>
    <!--First col-->
<div class="row">
  <div class="col-lg-6">
    <form action="{{url('register_user')}}" method="POST">
@csrf
  <div class="form-group">
    <label>Name</label>
   <input type="text" required="" id="name" value="{{ old('name') }}" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
   @if ($errors->has('name'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('name') }}</strong>
       </div>
       @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Email</label>
   <input type="email"   required=""  id="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">
   @if ($errors->has('email'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('email') }}</strong>
       </div>
       @endif
  </div>
</div>
</div>
<!-- end first col -->

<!-- second col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Password</label>
   <input type="password"   required="" id="password"  name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
   @if ($errors->has('password'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('password') }}</strong>
       </span>
   @endif
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
    <label>Re-type Password</label>
     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
  </div>
</div>
</div>
<!-- end second col -->
<div class="row">
<div align="right" class="col-sm-12">
  <button class="btn btn-primary">Register</button>
</div>
</div>
</form>
</div>

</div>
@endsection
