<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Admin;
use Carbon\Carbon;
use App\Adminlog;
use Auth;
use App\User;
use App\Announcement;
use App\Event;
use App\Requisition;
use App\Timesheet;
class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//Admin Home
    public function direct()
    {
       $announcement = Announcement::all();
       $event = Event::all();
       $data = Adminlog::where('admin_id','=',Auth::user()->id)->orderBy('created_at','DESC')->paginate(5);
       $last = Adminlog::where('admin_id','=',Auth::user()->id)->orderBy('created_at','DESC')->first();
       $total_rows = count(Adminlog::where('admin_id','=',Auth::user()->id)->get());
       $time_total = Adminlog::selectRaw('SUM(time_total) as sum')->where('admin_id','=',Auth::user()->id)->first();
       $total_hours = ($time_total->sum) - ($total_rows);
       $formatted_total = number_format($total_hours);
       return view('admin/home',compact('data','last','formatted_total','announcement','event'));
    }
//Admin time in
 public function timein()
 {
        Adminlog::create([
          'time_in' => Carbon::now(),
          'date' => Carbon::today(),
          'admin_id' => Auth::user()->id,
          'admin_name' =>Auth::user()->name,
        ]);
        return back();
}
//Admin time out
  public function timeout(Adminlog $id)
  {
      $data = Adminlog::where('id','=',$id->id)->first();
      $data->time_out = Carbon::now();
      $date_total = Carbon::now()->diffInMinutes($data->time_in);
      $data->time_total = $date_total;
      $data->save();
      return back();
    }
//Admin user list
    public function get_user()
    {
      $data = User::all();
      return view('admin/employees',compact('data'));
    }
//Admin request list
    public function get_leave()
    {
      $entry = request('entry');
      if ($entry == '20 entries') {
        $data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id', 'users.name')->where('requisitions.id', '!=' , NULL)->join('users','requisitions.user_id', '=', 'users.id')->orderBy('requisitions.created_at', 'DESC')->limit(20)->get();
      }elseif ($entry == '50 entries') {
        $data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id', 'users.name')->where('requisitions.id', '!=' , NULL)->join('users','requisitions.user_id', '=', 'users.id')->orderBy('requisitions.created_at', 'DESC')->limit(50)->get();
      }elseif ($entry == '100 entries') {
        $data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id', 'users.name')->where('requisitions.id', '!=' , NULL)->join('users','requisitions.user_id', '=', 'users.id')->orderBy('requisitions.created_at', 'DESC')->limit(100)->get();
      }elseif ($entry == 'all entries') {
        $data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id', 'users.name')->where('requisitions.id', '!=' , NULL)->join('users','requisitions.user_id', '=', 'users.id')->orderBy('requisitions.created_at', 'DESC')->get();
      }
      else {
        $data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id', 'users.name')->where('requisitions.id', '!=' , NULL)->join('users','requisitions.user_id', '=', 'users.id')->orderBy('requisitions.created_at', 'DESC')->get();
      }
      return view('admin/leave', compact('data','entry'));
    }
//Admin timesheet and filter
    public function get_timesheet()
    {

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $entry = request('entry');
        if (request('entry') == 'today') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->where('date', '=', $today)->orderBy('timesheets.created_at','DESC')->get();
        }
        elseif (request('entry') == 'yesterday') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->where('date', '=', $yesterday)->orderBy('timesheets.created_at','DESC')->get();
        }
        elseif (request('entry') == 'all') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->orderBy('timesheets.created_at','DESC')->get();
        }
        elseif (request('entry') == 'last entries') {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->orderBy('timesheets.created_at','DESC')->limit(100)->get();
        }
        else {
          $data = Timesheet::select('timesheets.*','users.*','timesheets.created_at')->where('timesheets.id','!=',NULL)->join('users','users.id','=','timesheets.user_id')->orderBy('timesheets.created_at','DESC')->get();
        }
        return view('admin/timesheet', compact('data','entry'));
    }
//Admin timesheet and filter
    public function admin_timesheet()
    {

        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $entry = request('entry');
        if (request('entry') == 'today') {
          $data = Adminlog::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->where('date', '=', $today)->orderBy('adminlogs.created_at','DESC')->get();
        }
        elseif (request('entry') == 'yesterday') {
          $data = Adminlog::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->where('date', '=', $yesterday)->orderBy('adminlogs.created_at','DESC')->get();
        }
        elseif (request('entry') == 'all') {
          $data = Adminlog::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->orderBy('adminlogs.created_at','DESC')->get();
        }
        elseif (request('entry') == 'last entries') {
          $data = Adminlog::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->orderBy('adminlogs.created_at','DESC')->limit(100)->get();
        }
        else {
          $data = Adminlog::select('adminlogs.*','admins.*','adminlogs.created_at')->where('adminlogs.id','!=',NULL)->join('admins','admins.id','=','adminlogs.admin_id')->orderBy('adminlogs.created_at','DESC')->get();
        }
        return view('admin/admin_timesheet', compact('data','entry'));
    }

//Admin accept request
    public function accept_leave(Requisition $id) {
    $data = Requisition::where('id','=',$id->id)->first();
    $data->status = 1;
    $data->save();
    $response = ['msg' => 'Leave Accepted!'];
    return response()->json($response);
  }
//Admin decline request
  public function decline_leave(Requisition $id) {
    $data = Requisition::where('id','=',$id->id)->first();
    $data->status = 2;
    $data->note = request('note');
    $data->save();
    $response =  ['msg' => 'Leave Declined!'];
    return response()->json($response);
  }
//Display Announcement and Event
  public function get_announce()
  {
    $announcement = Announcement::all();
    $event = Event::all();

    return view('admin/announce', compact('announcement','event'));
  }
//Update Announcement
  public function up_announcement()
  {
$this->validate(request(),
            [
                'announcement' => 'required',
            ]);
      $data = Announcement::where('id', '=', 1)->first();
      $data->announcement = request('announcement');
      $data->save();
      return redirect('admin/home');
    }
//Update Event
  public function up_event()
  {
    $this->validate(request(),
      [
        'event' => 'required'
      ]);
    $data = Event::where('id', '=', 1)->first();
    $data->event = request('event');
    $data->save();
    return redirect('admin/home');
  }
//Admin list table
  public function get_admin()
  {
    $data = Admin::paginate(15);
    return view('admin/admins',compact('data'));
  }
//Delete user
  public function destroy_user(User $id)
  {
    $data = User::where('id', '=', $id->id)->first();
    $data->delete();
    return response()->json();
  }
//Display User Info
  public function get_id(User $id)
  {
    $data = User::where('id', '=', $id->id)->first();
    return view('admin/get_id',compact('data'));
  }
//Update User Info
  public function update(User $id)
  {
    $this->validate(request(),
    [
        'name' => 'required|max:100|min:4|regex:/^[a-zA-Z. ,]+$/u',
         'number' => 'required|regex:/(09)[0-9]{9}/|max:11|min:11',
         'up_email' => 'required|email|max:100',
         'skype' => 'required|max:30|min:4',
         'tin' => 'required|min:4|max:50|regex:/^[0-9. -]+$/',
         'sss' => 'required|min:4||max:50|regex:/^[0-9. -]+$/',
         'philhealth' => 'required|min:4|max:50|regex:/^[0-9. -]+$/',
         'hdmf' => 'required|min:4|max:50|regex:/^[0-9. -]+$/',
         'b_day' => 'required',
         'employment' => 'required',
         'team_leader' => 'required|max:50|min:4|regex:/^[a-zA-Z. ,]+$/u',
         'civil_status' => 'required|max:40|min:4|regex:/^[a-zA-Z. ]+$/u',
         'nationality' => 'required|max:25|min:4|regex:/^[a-zA-Z. ]+$/u',
         'birth_place' => 'required|max:80|min:4|regex:/^[a-zA-Z0-9. , #]+$/u',
         'religion' => 'required|max:25|min:4|regex:/^[a-zA-Z. ]+$/u',
    ]);
    $data = User::where('id', '=', $id->id)->first();
    $data->name = request('name');
    $data->number = request('number');
    $data->email = request('up_email');
    $data->linkserve_skype = request('skype');
    $data->tin = request('tin');
    $data->sss = request('sss');
    $data->philhealth = request('philhealth');
    $data->hdmf = request('hdmf');
    $data->birthdate = request('b_day');
    $data->employment_date = request('employment');
    $data->team_leader = request('team_leader');
    $data->civil_status = request('civil_status');
    $data->nationality = request('nationality');
    $data->birthplace = request('birth_place');
    $data->religion = request('religion');
    $data->save();
    return back();
  }
//Delete Admin
  public function destroy_admin(Admin $id)
  {
    $data = Admin::where('id', '=', $id->id)->first();
    $data->delete();
    return response()->json();
  }
//Display Admin Info
  public function admin_id(Admin $id)
  {
    $data = Admin::where('id', '=', $id->id)->first();
    return view('admin/get_admin', compact('data'));
  }
//Update Admin
  public function update_admin(Admin $id)
  {
    $this->validate(request(),
    [
        'name' => 'required|max:100|min:4|regex:/^[a-zA-Z. ,]+$/u',
         'number' => 'required|regex:/(09)[0-9]{9}/|max:11|min:11',
         'up_email' => 'required|email|max:100',
         'skype' => 'required|max:50|min:4',
         'tin' => 'required|min:4|max:50|regex:/^[0-9. -]+$/',
         'sss' => 'required|min:4|max:50|regex:/^[0-9. -]+$/',
         'philhealth' => 'required|max:50|min:4|regex:/^[0-9. -]+$/',
         'hdmf' => 'required|min:4|max:50|regex:/^[0-9. -]+$/',
         'b_day' => 'required',
         'employment' => 'required',
         'civil_status' => 'required|max:25|min:4|regex:/^[a-zA-Z. ]+$/u',
         'nationality' => 'required|max:40|min:4|regex:/^[a-zA-Z. ]+$/u',
         'birth_place' => 'required|max:80|min:4|regex:/^[a-zA-Z0-9. , #]+$/u',
         'religion' => 'required|max:25|min:4|regex:/^[a-zA-Z. ]+$/u',
    ]);
    $data = Admin::where('id', '=', $id->id)->first();
    $data->name = request('name');
    $data->number = request('number');
    $data->email = request('up_email');
    $data->linkserve_skype = request('skype');
    $data->tin = request('tin');
    $data->sss = request('sss');
    $data->philhealth = request('philhealth');
    $data->hdmf = request('hdmf');
    $data->birthdate = request('b_day');
    $data->employment_date = request('employment');
    $data->civil_status = request('civil_status');
    $data->nationality = request('nationality');
    $data->birthplace = request('birth_place');
    $data->religion = request('religion');
    $data->save();
    return back();
  }
  //Create New User
public function register_user()
{
  $this->validate(request(),
              [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
              ]);
        User::create([
          'name' => request('name'),
          'email' => request('email'),
          'password' => Hash::make(request('password')),
        ]);
  return back();
}
 //Add Employee Interface
public function new_user()
{
  return view('admin/new_user');
}
public function truncate()
{
  $data = Timesheet::truncate();
  return back()->with('status','Deleted Successfully!');
}
public function admin_truncate()
{
  $data = Adminlog::truncate();
  return redirect('/admin_timesheet')->with('status','Deleted Successfully!');;
}
public function search_date()
{
  $data = Timesheet::where('date' , 'LIKE', '%'.request('date_search').'%')->get();
  return view('admin/timesheet', compact('data'));
}
}
