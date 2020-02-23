@extends('admin/layout/admin_app')
@section('content')
@if(Auth::user()->type == 'admin')
<div class="row">
  <div class="col-xs-4">
    <h4 class="page-title">Employees</h4>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped datatable">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th>Mobile Number</th>
            <th>Linkserve Skype Account</th>
            <th>Team Leader</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $datas)
          <tr>
            <td>
              <a href="#">
              <h2><p>{{$datas->name}}</a> <span>{{$datas->email}}</span></p></h2>
            </td>
           <td>{{$datas->number}}</td>
           <td>{{$datas->linkserve_skype}}</td>
           <td>{{$datas->team_leader}}</td>
            <td class="row">
               <form action="{{url('destroy').'/'.$datas->id}}" method="POST">
          <button class="btn btn-danger delete_form btn-sm"  type="button" data-ids ="{{$datas->id}}">
                 <i class="fa fa-trash-o"></i></button>
                            </form>
                            &nbsp;
            <a href="{{url('get_id').'/'.$datas->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>
          </a>
            </td>
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
    <h4 class="page-title">Employees</h4>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped datatable">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th>Mobile Number</th>
            <th>Linkserve Skype Account</th>
            <th>Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach($data as $datas)
          <tr>
            <td>
              <a href="#">
              <h2><p>{{$datas->name}}</a> <span>{{$datas->email}}</span></p></h2>
            </td>
            <td>{{$datas->number}}</td>

           <td>{{$datas->linkserve_skype}}</td>
    <td class="row">
               <form action="{{url('destroy').'/'.$datas->id}}" method="POST">
          <button class="btn btn-danger delete_form btn-sm"  type="button" data-ids ="{{$datas->id}}">
                 <i class="fa fa-trash-o"></i></button>
                            </form>
                            &nbsp;
            <a href="{{url('get_id').'/'.$datas->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>
          </a>

            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>

</div>
@endif
@endsection
