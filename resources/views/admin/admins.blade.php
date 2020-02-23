@extends('admin/layout/admin_app')
@section('content')
@if(Auth::user()->type == 'admin')
<div class="row">
  <div class="col-xs-4">
    <h4 class="page-title">Admins</h4>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th>Type</th>
            <th>Linkserve Skype Account</th>
            <th>Mobile Number</th>
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
            <td>{{$datas->type}}</td>
           <td>{{$datas->linkserve_skype}}</td>
           <td>{{$datas->number}}</td>
            <td class="row">
              @if($datas->type == 'admin')
          <button class="btn btn-danger delete_admin btn-sm" disabled=""  type="button">
                 <i class="fa fa-trash-o"></i></button>
                 </form>
                 @else
                 <form action="{{url('admin_destroy').'/'.$datas->id}}" method="POST">
          <button class="btn btn-danger delete_admin btn-sm"  type="button" data-ids ="{{$datas->id}}">
                 <i class="fa fa-trash-o"></i></button>
                 </form>
                 @endif
                            &nbsp;
            <a href="{{url('admin_id').'/'.$datas->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>
          </a>

            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{$data->links()}}
</div>
@else
<div class="row">
  <div class="col-xs-4">
    <h4 class="page-title">Admins</h4>
  </div>

</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th style="width:20%;">Name</th>
            <th>Type</th>
            <th>Linkserve Skype Account</th>
            <th align="center">Action</th>

          </tr>
        </thead>
        <tbody>
          @foreach($data as $datas)
          <tr>
            <td>
              <a href="#">
              <h2><p>{{$datas->name}}</a> <span>{{$datas->email}}</span></p></h2>
            </td>
            <td>{{$datas->type}}</td>

           <td>{{$datas->linkserve_skype}}</td>

 <td>
              @if(Auth::user()->id == $datas->id)
              <a href="{{url('admin_id').'/'.$datas->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-pencil"></i>

                 @else


                 @endif

          </a>

            </td>

          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
  {{$data->links()}}
</div>
@endif
@endsection
