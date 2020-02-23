 @extends('user/layout/app')

@section('content')
<div class="container-fluid">
  <div class="col">
  @if (session('status'))
  <div class="alert alert-success text-center">
      {{ session('status') }}
  </div>
  @endif
  <h3>Employee Request</h3>
</div>
    <div class="col-lg-4">
    <div class="text-center">

    </div>

    <br>

  <div class="form-group">
    <form action="{{url('send_request')}}" method="post">
        @csrf
        <input type="hidden" value="{{Auth::user()->name}}" name="username">
    <label>Leave Date</label>
    <div class="cal-icon">
                @if ($errors->has('date'))
                    <div class="invalid-feedback text-danger">
                        <strong>{{ $errors->first('date') }}</strong>
                    </div>
                    @endif
   <input type="text" name="date" class="form-control datetimepicker" id="datetimepicker">
</div>
  </div>
  <div class="form-group">
    <label>Type of Leave</label>
    <select class="form-control form-control-lg" name="type">
      <option value="Undertime">Undertime</option>
      <option value="Halfday">Halfday</option>
      <option value="Vacation Leave">Vacation Leave</option>
      <option value="Equipment Change">Equipment Change</option>
      <option value="Emergency Leave">Emergency Leave</option>
    </select>
  </div>
  <div class="form-group">
    <label>Reason</label>
    @if ($errors->has('reason'))
                <div class="invalid-feedback text-danger">
                    <strong>{{ $errors->first('reason') }}</strong>
                </div>
                @endif
    <div class="panel panel-primary">
     <div class="panel-heading text-center"> Reason</div>
      <div class="panel-body">
     <textarea  name="reason" rows="8" cols="100" class="form-control" style="width:100%;" required=>
      </textarea>
  </div>
</div>
</div>
<button type="submit" class="btn btn-danger">Submit</button>
</form>
</div>
<br>
<br>
<br>



<div class="col-lg-8">

<div class="panel panel-default" style="margin-top:2%">
            <div class="panel-body">
                <div class="table-responsive">
            <table class="table table-striped custom-table m-b-0">
                    <thead>
                        <tr>

                            <th scope="col">Leave Date</th>
                            <th scope="col">Reason</th>
                            <th scope="col">Type of Leave</th>
                            <th scope="col">Status</th>
                            <th scope="col">Note</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                        <tr>

                            <?php
                            $date = str_replace('/','-',$dt->date)
                            ?>
                            <td>{{date('F d, o',strtotime($date))}}</td>
                            <td>{{$dt->reason}}</td>
                            <td>{{$dt->type}}</td>
                            @if($dt->status == 1)
                            <td><span class="badge bg-success"><i class="fa fa-check"></i></span></td>
                            @elseif($dt->status == 2)
                            <td><span class="badge bg-danger"><i class="fa fa-times"></i></span></td>
                            @else
                            <td><span class="badge bg-primary"><i class="fa fa-clock-o"></i></span></td>
                            @endif
                            <td>{{$dt->note}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                  {{$data->links()}}
                </div>
            </div>
        </div>

    </div>
</div>

    @endsection
