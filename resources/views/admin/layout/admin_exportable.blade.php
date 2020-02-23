<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>LinkServeSystem</title>

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/bootstrap.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/bootstrap-datetimepicker.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/flipclock.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/swal.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('plugin-css/jquery-confirm.css')}}">
</head>
<body>
  <div class="main-wrapper">
@include('admin/layout/header')
@include('admin/layout/sidebar')
<div class="page-wrapper" style="min-height: 626px;">
<div class="content container-fluid">
  @yield('content')

</div>
</div>
</div>
<script type="text/javascript" src="{{asset('plugin-js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/flipclock.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/bootstrap.min.js')}}"></script>
<!-- Jquery DataTable Plugin Js -->
<script type="text/javascript" src="{{asset('plugin-js/jquery.table2excel.js')}}"></script>
<script src="{{ asset('js/jquery.tableToExcel.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/bootstrap-datetimepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/app_template.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/dev.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/swal.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/jquery-confirm.js')}}"></script>
<script type="text/javascript" src="{{asset('plugin-js/pusher.min.js')}}"></script>

<script>


  var pusher = new Pusher('c595058b6bebacec6d67', {
    cluster: 'ap1',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('form-submit', addMessage);

  function addMessage(data) {
     var listItem = $("<li class='list-group-item'></li>");
     listItem.html(data.message);
     $('#notif').prepend(listItem);
   }
</script>
</body>
</html>
