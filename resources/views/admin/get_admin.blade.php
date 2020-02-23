@extends('admin/layout/admin_app')

@section('content')
<div class="container-fluid">
    <div class="col-lg-12">
    <div class="text-center">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
    </div>
    <h3>Employee Information</h3>
    <!--First col-->
<div class="row">
  <div class="col-lg-6">
    <form action="{{url('update_admin').'/'.$data->id}}" method="POST">
      @csrf
      @method('PUT')
  <div class="form-group">
    <label>Name</label>
   <input type="text" value="{{$data->name}}"   name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">
   @if ($errors->has('name'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('name') }}</strong>
       </div>
       @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Contact Number</label>
   <input type="text" value="{{$data->number}}" name="number" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}">
   @if ($errors->has('number'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('number') }}</strong>
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
    <label>Email Address</label>
   <input type="text" value="{{$data->email}}"    name="up_email" class="form-control{{ $errors->has('up_email') ? ' is-invalid' : '' }}">
   @if ($errors->has('up_email'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('up_email') }}</strong>
       </div>
       @endif
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
    <label>Skype Account</label>
   <input type="text"  value="{{$data->linkserve_skype}}" name="skype" class="form-control{{ $errors->has('skype') ? ' is-invalid' : '' }}">
   @if ($errors->has('skype'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('skype') }}</strong>
       </div>
       @endif
  </div>
</div>
</div>
<!-- end second col -->

<!-- third col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>TIN Number</label>
   <input type="text"  value="{{$data->tin}}"   name="tin" class="form-control{{ $errors->has('tin') ? ' is-invalid' : '' }}">
   @if ($errors->has('tin'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('tin') }}</strong>
       </div>
       @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>SSS Number</label>
   <input type="text"  value="{{$data->sss}}"  name="sss"  class="form-control{{ $errors->has('sss') ? ' is-invalid' : '' }}">
   @if ($errors->has('sss'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('sss') }}</strong>
       </div>
       @endif
  </div>
</div>
</div>
<!-- end third col -->

<!-- fourth col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Philhealth Number</label>
   <input type="text"  value="{{$data->philhealth}}"   name="philhealth" class="form-control{{ $errors->has('philhealth') ? ' is-invalid' : '' }}">
   @if ($errors->has('philhealth'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('philhealth') }}</strong>
       </div>
       @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>HDMF Number</label>
   <input type="text"  value="{{$data->hdmf}}"  name="hdmf" class="form-control{{ $errors->has('hdmf') ? ' is-invalid' : '' }}">
   @if ($errors->has('hdmf'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('hdmf') }}</strong>
       </div>
       @endif
  </div>
</div>
</div>
<!-- end fourth col -->

<!-- seventh col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Birth Date</label>
 <div class="cal-icon">
   <input type="text"  value="{{$data->birthdate}}"  name="b_day" class="form-control{{ $errors->has('b_day') ? ' is-invalid' : '' }} datetimepicker" id="datetimepicker">
   @if ($errors->has('b_day'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('b_day') }}</strong>
       </div>
       @endif
</div>
  </div>
</div>
<div class="col-lg-6">
   <div class="form-group">
    <label>Employment Date</label>
 <div class="cal-icon">
   <input type="text"  value="{{$data->employment_date}}"  name="employment" class="form-control{{ $errors->has('employment') ? ' is-invalid' : '' }} datetimepicker" id="datetimepicker">
   @if ($errors->has('employment'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('employment') }}</strong>
       </div>
       @endif
</div>
  </div>
</div>
</div>
<!-- end seventh col -->

<!-- fifth col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Civil Status</label>
   <input type="text"  value="{{$data->civil_status}}"  name="civil_status"  class="form-control{{ $errors->has('civil_status') ? ' is-invalid' : '' }}">
   @if ($errors->has('civil_status'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('civil_status') }}</strong>
       </div>
       @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Nationality</label>
   <input type="text"  value="{{$data->nationality}}"  name="nationality"  class="form-control{{ $errors->has('nationality') ? ' is-invalid' : '' }}">
   @if ($errors->has('nationality'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('nationality') }}</strong>
       </div>
       @endif
  </div>
</div>
</div>
<!-- end fifth col -->

<!-- sixth col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Birth Place</label>
   <input type="text"  value="{{$data->birthplace}}"   name="birth_place" class="form-control{{ $errors->has('birth_place') ? ' is-invalid' : '' }}">
   @if ($errors->has('birth_place'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('birth_place') }}</strong>
       </div>
       @endif
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Religion</label>
   <input type="text"  value="{{$data->religion}}"   name="religion" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}">
   @if ($errors->has('religion'))
       <div class="invalid-feedback text-danger">
           <strong>{{ $errors->first('religion') }}</strong>
       </div>
       @endif
  </div>
</div>
</div>
<!-- end sixth col -->
<div class="row">
<div align="right" class="col-sm-12">
  <button class="btn btn-primary update_form">Save</button>
  &nbsp;
<a href="{{url('get_admins')}}" class="btn btn-secondary">Close</a>
</div>
</div>
</form>

</div>

</div>
@endsection
