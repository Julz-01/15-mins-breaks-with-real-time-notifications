@extends('admin/layout/admin_app')

@section('content')
<div class="container-fluid">

  @if(!empty($last->time_out) OR $last == NULL)
  <form action="{{ url('admin/timein') }}" method="post">
    {{csrf_field()}}

    @else
    <form action="{{ url('admin/timeout').'/'.$last->id }}" method="post">
      {{csrf_field()}}
      @endif


      <div class="row">
        <div class="col-lg-8">
          <div class="panel panel-primary">
            <div class="panel-heading" style="height:50px;" align="center"><i class="fa fa-clock-o"> &nbsp;</i> Breaks

            </div>
            <div class="panel-body">
              <div class="row" style="display: flex; justify-content: center">
                @if(!empty($last->time_out) OR $last == NULL)
                <div><div class="clock"></div></div>
                @else
                <div><div class="clock1"></div></div>
                @endif
              </div>
              <div class="">
              @if(!empty($last->time_out) OR $last == NULL)
              <button type="submit" class="btn btn-danger rounded on" id="on">Time-Out</button>
              @else
              <button type="submit" class="btn btn-success rounded off" id="off">Time-In</button>
              @endif
              </div>
             <hr>
             <table class="table table-hover">
                <thead>
                  <tr>

                    <th >Date</th>
                    <th scope="col">Time-out</th>
                    <th scope="col">Time-in</th>
                    <th class="text-center">Total Minute(s)</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $dt)
                  <tr>

                    <td>{{date('F d, o',strtotime($dt->time_in))}}</td>
                    <td>{{date('h:i A',strtotime($dt->time_in))}}</td>
                    @if(empty($dt->time_out))
                    <td></td>
                    @else
                    <td>{{date('h:i A',strtotime($dt->time_out))}}</td>
                    @endif
                    <?php

                    ?>
                    <td align="center">{{$dt->time_total}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$data->links()}}
            </div>
            @if(Auth::user()->employeetype == 'Intern')
            <div class="panel-footer">
              <div class="text-right">
            <strong>  Sum of Total Hours:  {{$formatted_total}} Hour(s) </strong>
              </div>
            </div>
            @endif
          </div>

           </div>

        <div class="col-lg-4">
@if(Auth::user()->type == 'moderator')
@foreach($announcement as $announcement)
            <div class="panel panel-primary"> <div class="panel-heading
text-center"><i class="fa fa-bullhorn"> &nbsp;</i>Announcement</div> <div class="panel-body"> <textarea name="name"
rows="8" cols="80" class="form-control" style="width:100%;"
disabled> {{$announcement->announcement}}</textarea> </div>

 </div>
@endforeach

@foreach($event as $event)
  <div class="panel panel-primary"> <div class="panel-heading
text-center"><i class="fa fa-calendar"> &nbsp;</i>Event</div> <div class="panel-body"> <textarea name="name"
rows="8" cols="80" class="form-control" style="width:100%;"
disabled>{{$event->event}} </textarea> </div>

 </div>
 @endforeach
 @else
 @foreach($announcement as $announcement)
      <div class="panel panel-primary"> <div class="panel-heading
text-center"><i class="fa fa-bullhorn"> &nbsp;</i>Announcement</div> <div class="panel-body"> <textarea name="name"
rows="8" cols="80" class="form-control" readonly="" style="width:100%;"
>  {{$announcement->announcement}}</textarea> </div>

 </div>
@endforeach

@foreach($event as $event)
  <div class="panel panel-primary"> <div class="panel-heading
text-center"><i class="fa fa-calendar"> &nbsp;</i>Event</div> <div class="panel-body"> <textarea name="name"
rows="8" cols="80" class="form-control" readonly="" style="width:100%;"
>{{$event->event}}
</textarea> </div>
 </div>
 @endforeach
 @endif


        </div>
      </div>

    </div>
@endsection
