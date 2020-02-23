@extends('layouts.app')

@section('content')
<div class="container-fluid">

  @if(!empty($last->time_out) OR $last == NULL)
  <form action="{{ url('/timein') }}" method="post">
    {{csrf_field()}}
    @else
    <form action="{{ url('/timeout').'/'.$last->id }}" method="post">
      {{csrf_field()}}
      @endif


      <div class="row">
        <div class="col-lg-8">

          <div class="panel panel-default">
            <div class="panel-heading" style="height:50px;"> <i class="fa fa-clock-o"> &nbsp;</i>Breaks

            </div>

            <div class="panel-body">
              <div class="row" style="display: flex; justify-content: center">
                <div><div class="clock"></div></div>
              </div>
              <div class="">
              @if(!empty($last->time_out) OR $last == NULL)
              <button type="submit" class="btn btn-success rounded">Time-in</button>
              @else
              <button type="submit" class="btn btn-primary rounded">Time-Out</button>
              @endif
              </div>

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Time-in</th>
                    <th scope="col">Time-out</th>
                    <th scope="col">Total Minute(s)</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $dt)
                  <tr>
                    <th scope="row">{{$dt->id}}</th>
                    <td>{{date('F d, o h:i A',strtotime($dt->time_in))}}</td>
                    @if(empty($dt->time_out))
                    <td></td>
                    @else
                    <td>{{date('F d, o h:i A',strtotime($dt->time_out))}}</td>
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

          </div>  </div>

        <div class="col-lg-4">
            <div class="panel panel-danger"> <div class="panel-heading
text-center">Announcement</div> <div class="panel-body"> <textarea name="name"
rows="8" cols="80" class="form-control" style="width:100%;"
disabled> </textarea> </div> </div>
          <div class="row">

          </div>
        </div>
      </div>

    </div>
@endsection
