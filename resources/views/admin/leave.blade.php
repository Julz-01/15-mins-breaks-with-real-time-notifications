@extends('admin/layout/admin_app')
@section('content')
@if(Auth::user()->type == 'admin')
<div class="row">
  <div class="col-xs-4">
    <h4 class="page-title">Request Log</h4>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col">
        <form action="{{url('leave_filter')}}" method="POST">
          @csrf
        <select name="entry" onchange="this.form.submit()" class="form-control form-control-lg">
  @if($entry == '20 entries'){
    <option>{{$entry}}</option>
    <option value="50 entries">50 entries</option>
    <option value="100 entries">100 entries</option>
    <option value="All entries">All entries</option>
  }
  @elseif($entry == '50 entries'){
  <option>{{$entry}}</option>
  <option value="20 entries">20 entries</option>
  <option value="100 entries">100 entries</option>
  <option value="All entries">All entries</option>
  }
  @elseif($entry == '100 entries'){
  <option>{{$entry}}</option>
  <option value="20 entries">20 entries</option>
  <option value="50 entries">50 entries</option>
  <option value="All entries">All entries</option>
  }
  @elseif($entry == '100 entries'){
  <option>{{$entry}}</option>
  <option value="20 entries">20 entries</option>
  <option value="50 entries">50 entries</option>
  <option value="All entries">All entries</option>
  }
  @elseif($entry == 'All entries'){
  <option>{{$entry}}</option>
  <option value="20 entries">20 entries</option>
  <option value="50 entries">50 entries</option>
  <option value="100 entries">100 entries</option>
  }
  @else{
  <option value="All entries">All entries</option>
  <option value="20 entries">20 entries</option>
  <option value="50 entries">50 entries</option>
  <option value="100 entries">100 entries</option>
  }
  @endif
        </select>
      </form>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th>Date of Leave</th>
            <th>Type of Leave</th>
            <th>Reason</th>
            <th>Actions</th>
            <th>Status</th>

          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td>
              <a href="#">
              <h2><p>{{$dt->name}}</a></p></h2>
            </td>
            <td>{{$dt->date}}</td>
            <td>{{$dt->type}}</td>
           <td>{{$dt->reason}}</td>
            @if($dt->status != 0)
            <td><a href="#" class="btn btn-success btn-sm" disabled><i class="fa fa-check"></i></a> <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-times"></i></a> </td>
            @else
            <td><a href="#" class="btn btn-success btn-sm reqacc" data-ids="{{$dt->req_id}}"><i class="fa fa-check"></i></a> <a href="#" class="btn btn-danger btn-sm reqdec" data-ids="{{$dt->req_id}}"><i class="fa fa-times"></i></a> </td>
            @endif

            @if($dt->status == 1)
            <td><span class="badge bg-success">accepted</span></td>
            @elseif($dt->status == 2)
            <td><span class="badge bg-danger">declined</span></td>
            @else
            <td><span class="badge bg-secondary">pending</i></span></td>
            @endif

          </tr>
         @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@else
<div class="row">
  <div class="col-xs-4">
    <h4 class="page-title">Request Log</h4>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th>Date of Leave</th>
            <th>Type of Leave</th>
            <th>Reason</th>
            <th>Actions</th>
            <th>Status</th>

          </tr>
        </thead>
        <tbody>
          @foreach($data as $dt)
          <tr>
            <td>
              <a href="#">
              <h2><p>{{$dt->name}}</a></p></h2>
            </td>
            <td>{{$dt->date}}</td>

          @if($dt->type=='ut')
            <td>Undertime</td>
            @elseif($dt->type=='hd')
            <td>Halfday</td>
            @elseif($dt->type=='vl')
            <td>Vacation Leave</td>
            @elseif($dt->type=='ec')
            <td>Equipment Change</td>
            @elseif($dt->type=='el')
            <td>Emergency Leave</td>
            @else
            <td></td>
            @endif
           <td>{{$dt->reason}}</td>
           @if($dt->status != 0)
           <td><a href="#" class="btn btn-success btn-sm" disabled><i class="fa fa-check"></i></a> <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-times"></i></a> </td>
           @else
           <td><a href="#" class="btn btn-success btn-sm reqacc" data-ids="{{$dt->req_id}}"><i class="fa fa-check"></i></a> <a href="#" class="btn btn-danger btn-sm reqdec" data-ids="{{$dt->req_id}}"><i class="fa fa-times"></i></a> </td>
           @endif
            @if($dt->status == 1)
            <td><span class="badge bg-success">Accepted</span></td>
            @elseif($dt->status == 2)
            <td><span class="badge bg-danger">Declined</span></td>
            @else
            <td><span class="badge bg-secondary">Pending</span></td>
            @endif

          </tr>
         @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@endif
@endsection
