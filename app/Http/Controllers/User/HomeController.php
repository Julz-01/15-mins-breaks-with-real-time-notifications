<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\MyEvent;
use Carbon\Carbon;
use App\Timesheet;
use App\Requisition;
use Auth;
use App\Announcement;
use App\Event;
use App\User;
class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
       public function index()
     {
      $announcement = Announcement::all();
      $event = Event::all();
       $data = Timesheet::where('user_id','=',Auth::user()->id)->orderBy('created_at','DESC')->paginate(4);
       $last = Timesheet::where('user_id','=',Auth::user()->id)->orderBy('created_at','DESC')->first();
       $total_rows = count(Timesheet::where('user_id','=',Auth::user()->id)->get());
       $time_total = Timesheet::selectRaw('SUM(time_total) as sum')->where('user_id','=',Auth::user()->id)->first();
       $total_hours = ($time_total->sum) - ($total_rows);
       $formatted_total = number_format($total_hours);
       return view('user/home',compact('data','last','formatted_total','announcement','event'));
         // return view('/home');
     }
    public function timein(){

        Timesheet::create([
          'user_id' => Auth::user()->id,
          'user_name'=>Auth::user()->name,
          'date' => Carbon::today(),
          'time_in' => Carbon::now(),
        ]);
        return back();
}
    public function timeout(Timesheet $id){
      $data = Timesheet::where('id','=',$id->id)->first();
      $data->time_out = Carbon::now();
      $date_total = Carbon::now()->diffInMinutes($data->time_in);
      $data->time_total = $date_total;
      $data->save();
      return back();
    }
    public function request()
{
 $data = Requisition::select('requisitions.id as req_id', 'requisitions.*','users.id')->join('users','requisitions.user_id', '=', 'users.id')->where('users.id','=', Auth::user()->id)->orderBy('status', 'ASC')->paginate(7);
      return view('user/request',compact('data'));
}
    public function send_request()
    {
        $this->validate(request(),[
        'date' => 'required',
        'reason' => 'required',
        'type' => 'required',
      ]);
      Requisition::create([
        'user_id' => Auth::user()->id,
        'user_name' => request('username') ,
        'date' => request('date'),
        'reason' => request('reason'),
        'status' => 0 ,
        'type' => request('type'),
      ]);
      $username = Auth::user()->name;
      $type = request('type');
        event(new MyEvent($username));
          return back()->with('status','your request has sent!');
    }
    public function get_profile()
    {
      $data = User::where('id', '=', Auth::user()->id)->first();
      return view('user/profile' ,compact('data'));
    }
}
