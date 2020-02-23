@extends('admin/layout/admin_exportable')
@section('content')

    <div class="col-lg-12">
    <div class="text-center">
    </div>
    <h4>Timesheet</h4>
    <!--First col-->
<div class="row">
  <div class="col-lg-3 col-md-3">
    <form action="{{url('filter')}}" method="POST">
@csrf
  <div class="form-group">
    <select name="entry" class="form-control" onchange="this.form.submit()">
      @if($entry == 'all'){
<option>{{$entry}}</option>
<option value="today">today</option>
<option value="yesterday">yesterday</option>
<option value="last entries">last entries</option>
}
@elseif($entry == 'today'){
<option>{{$entry}}</option>
<option value="all">all</option>
<option value="yesterday">yesterday</option>
<option value="last entries">last entries</option>
}
@elseif($entry == 'yesterday'){
<option>{{$entry}}</option>
<option value="all">all</option>
<option value="today">today</option>
<option value="last entries">last entries</option>
}
@elseif($entry == 'last entries'){
<option>{{$entry}}</option>
<option value="all">all</option>
<option value="today">today</option>
<option value="yesterday">yesterday</option>
}
@else{
<option value="all">all</option>
<option value="today">today</option>
<option value="yesterday">yesterday</option>
<option value="last entries">last entries</option>
}
@endif
    </select>
  </div>
  </form>
</div>
<div class="col-lg-3 col-md-3">
  <div class="form-group">
  <button class="btn btn-outline-danger btn-md form-control" id="button-excel"><i class="fa fa-download"></i></button>
  &nbsp;&nbsp;

  </div>
</div>

  <div class="col-lg-3 col-md-3">
  <div class="form-group">
    <form action="{{url('truncate')}}" method="POST">
        @csrf
    <button class="btn btn-outline-danger btn-md form-control" type="submit"><i class="fa fa-trash"></i></button>
    </form>
  </div>
</div>

<div class="col-lg-3 col-md-3">
  <div class="form-group">
    <form class="form-inline" action="" method="POST">
      @csrf
      <div class="form-group row">
          <input type="text" name="date_search" class="form-control datetimepickerjulz">
          <button class="btn btn-danger"><i class="fa fa-search"></i></button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- end second col -->


<div class="table-responsive">
  <table class="table table-striped table2excel">
    <thead>
      <tr>
        <th >Name</th>
        <th class="text-center">Date</th>
        <th class="text-center">Time Out</th>
        <th class="text-center">Time In</th>
        <th class="text-center">Total Minute(s)</th>

      </tr>
    </thead>
    <tbody>
      @if (session('status'))
      <div class="alert alert-danger text-center">
        {{ session('status') }}
      </div>
      @endif
      @foreach($data as $dt)
      <tr>
        <td class="text-left">

        {{$dt->name}}
        </td>
    <td class="text-center">{{date('F d, o',strtotime($dt->time_in))}}</td>
    <td class="text-center">{{date('h:i A',strtotime($dt->time_in))}}</td>

        <td class="text-center">{{date('h:i A',strtotime($dt->time_out))}}</td>
        <td class="text-center">{{$dt->time_total}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
</div>

@endsection
