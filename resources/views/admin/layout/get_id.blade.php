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
    <form action="" method="POST">
  <div class="form-group">
    <label>Name</label>   
    
                @if ($errors->has('name'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                    @endif
   <input type="text" name="name" class="form-control">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Contact Number</label>   
    
                @if ($errors->has('number'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('number') }}</strong>
                    </div>
                    @endif
   <input type="text" name="number" class="form-control">
  </div>
</div>
</div>
<!-- end first col -->

<!-- second col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Email Address</label>   
    
                @if ($errors->has('email_add'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('email_add') }}</strong>
                    </div>
                    @endif
   <input type="text" name="email_add" class="form-control">
  </div>
</div>

<div class="col-lg-6">
  <div class="form-group">
    <label>Skype Account</label>   
    
                @if ($errors->has('skype'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('skype') }}</strong>
                    </div>
                    @endif
   <input type="text" name="skype" class="form-control">
  </div>
</div>
</div>
<!-- end second col -->

<!-- third col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>TIN Number</label>   
    
                @if ($errors->has('tin'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('tin') }}</strong>
                    </div>
                    @endif
   <input type="text" name="tin" class="form-control">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>SSS Number</label>   
    
                @if ($errors->has('sss'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('sss') }}</strong>
                    </div>
                    @endif
   <input type="text" name="sss" class="form-control">
  </div>
</div>
</div>
<!-- end third col -->

<!-- fourth col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Philhealth Number</label>   
    
                @if ($errors->has('philhealth'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('philhealth') }}</strong>
                    </div>
                    @endif
   <input type="text" name="philhealth" class="form-control">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>HDMF Number</label>   
    
                @if ($errors->has('hdmf'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('hdmf') }}</strong>
                    </div>
                    @endif
   <input type="text" name="hdmf" class="form-control">
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
                @if ($errors->has('b_day'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('b_day') }}</strong>
                    </div>
                    @endif
   <input type="text" name="b_day" class="form-control datetimepicker" id="datetimepicker">
</div>
  </div>
</div>
<div class="col-lg-6">
   <div class="form-group">
    <label>Employment Date</label>   
 <div class="cal-icon"> 
                @if ($errors->has('employment'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('employment') }}</strong>
                    </div>
                    @endif
   <input type="text" name="employment" class="form-control datetimepicker" id="datetimepicker">
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
    
                @if ($errors->has('civil_status'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('civil_status') }}</strong>
                    </div>
                    @endif
   <input type="text" name="civil_status" class="form-control">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Nationality</label>   
    
                @if ($errors->has('nationality'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('nationality') }}</strong>
                    </div>
                    @endif
   <input type="text" name="nationality" class="form-control">
  </div>
</div>
</div>
<!-- end fifth col -->

<!-- sixth col -->
<div class="row">
  <div class="col-lg-6">
  <div class="form-group">
    <label>Birth Place</label>   
    
                @if ($errors->has('birth_place'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('birth_place') }}</strong>
                    </div>
                    @endif
   <input type="text" name="birth_place" class="form-control">
  </div>
</div>
<div class="col-lg-6">
  <div class="form-group">
    <label>Religion</label>   
    
                @if ($errors->has('religion'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('religion') }}</strong>
                    </div>
                    @endif
   <input type="text" name="religion" class="form-control">
  </div>
</div>
</div>
<!-- end sixth col -->

<div align="right" class="col-sm-12">
  <button class="btn btn-primary">Save</button>
</div>]
</form>

</div>

</div>
@endsection
