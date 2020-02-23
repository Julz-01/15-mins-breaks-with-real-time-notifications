@extends('admin/layout/admin_app')

@section('content')
<div class="container-fluid">

      <div class="row">
        <div class="col-lg-6">
 <form action="{{url('up_announcement')}}" method="POST">
  @csrf
  @method('PUT')
      @foreach($announcement as $announcement)
      <div class="panel panel-primary"> <div class="panel-heading
text-center"><i class="fa fa-bullhorn">&nbsp;</i>Announcement</div> <div class="panel-body">
  <textarea name="announcement"
rows="8" cols="80" class="form-control" style="width:100%;">
 {{$announcement->announcement}}
</textarea>
</div>
<button class="btn btn-outline-danger  btn-block">Update Announcement</button>
 </div>
</form>
@endforeach

           </div>

        <div class="col-lg-6">

<form action="{{url('up_event')}}" method="POST">
  @csrf
  @method('PUT')
@foreach($event as $event)
  <div class="panel panel-primary"> <div class="panel-heading
text-center"><i class="fa fa-calendar">&nbsp;</i>Event</div> <div class="panel-body"> <textarea name="event"
rows="8" cols="80" class="form-control" style="width:100%;"
>{{$event->event}}
</textarea> </div>
<button class="btn btn-outline-primary  btn-block">Update Event</button>
 </div>
</form>
 @endforeach


          <div class="row">

          </div>
        </div>
      </div>

    </div>
@endsection
