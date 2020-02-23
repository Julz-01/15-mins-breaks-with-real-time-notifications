
 @extends('user/layout/app')
@section('content')
<div class="row">
  <div class="col-sm-8">
    <h4 class="page-title">Profile</h4>
  </div>
  
</div>
<div class="card-box m-b-0">
  <div class="row">
    <div class="col-md-12">
      <div class="profile-view">
        <div class="profile-img-wrap">
					<div class="profile-img">
						<a href="#" class="avatar">{{substr($data->name,0,1)}}</a>
					</div>
				</div>
        <div class="profile-basic">
          <div class="row"><br/>
            <div class="col-md-5">
              <div class="profile-info-left text-center">
                <div class="row">
                   <h2 class="user-name m-t-0 m-b-0">{{Auth::user()->name}}</h2>
                </div>
                   <div class="row">
                <medium class="text-muted">{{Auth::user()->department}}</medium>  
                </div>

              
              </div>
            </div>
            <div class="col-md-7">
                <h5><strong>Contact Information</strong></h5>
              <ul class="personal-info">
                <li>
                  <span class="title">Phone Number:</span>
                  <span class="text">{{$data->number}}</span>
                </li>
                 <li>
                  <span class="title text-left">Linkserve Email:</span>
                  <span class="text">{{$data->email}}</span>
                </li>
                 <li>
                  <span class="title text-left">Linkserve Skype:</span>
                  <span class="text">{{$data->linkserve_skype}}</span>
                </li>
              </ul><br/><br/>
              
            </div>
          </div>
        </div>
       
        <hr>
            <div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="col-lg-12">
                    <label class="text-muted">Employment Date:</label>
                    <medium class="text-dark"> &nbsp;{{$data->employment_date}}</medium>
                  </div>
                  <div class="col-lg-12">
                  </div>
                  <div class="col-lg-12">
                    <label class="text-muted">Birth Date:</label>
                    <medium class="text-dark">&nbsp;{{$data->birthdate}}</medium>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="col-md-6">
                    <label class="text-muted">TIN Number:</label>
                    <medium class="text-dark"> &nbsp;{{$data->tin}}</medium>
                  </div>
                  <div class="col-md-6">
                    <label class="text-muted">SSS Number:</label>
                    <medium class="text-dark">&nbsp;{{$data->sss}}</medium>
                  </div>
                  <div class="col-md-6">
                    <label class="text-muted">Philhealth:</label>
                    <medium class="text-dark">&nbsp;{{$data->philhealth}}</medium>
                  </div>
                  <div class="col-md-6">
                    <label class="text-muted">HDMF:</label>
                    <medium class="text-dark">&nbsp;  {{$data->hdmf}}</medium>
                  </div>
                </div>
              </div>
                
            </div>
    
      </div>
    </div>
  </div>
</div>
@endsection
