<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

class AdminController extends Controller
{
    public function authLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    public function index() {
        return view('admin_login');
    }

    public function show_dashboard() {
        $this->authLogin();
        $time = Carbon::now('Asia/Ho_Chi_Minh')->subWeeks(1);
        $timeday = Carbon::now('Asia/Ho_Chi_Minh')->subDay(1);
        $startDate = Carbon::now('Asia/Ho_Chi_Minh');
        $time_month = $startDate->firstOfMonth();
        // $time_month = Carbon::now()->month();
        $total_7 = DB::table('tbl_order')->where('date','>',$time)->sum('total_price');
        $day = DB::table('tbl_order')->where('date','>',$timeday)->sum('total_price');
        $month = DB::table('tbl_order')->where('date','>',$time_month)->sum('total_price');

        
        return view('admin.dashboard')->with('week',$total_7)->with('day',$day)->with('month',$month);
    }
    public function dashboard(Request $request) {
        $admin_account = $request->input('admin_account');
        $admin_password = md5($request->input('admin_password'));
        
        $result = DB::table('tbl_admin')->where('account',$admin_account)->where('password',$admin_password)->first();
        
        if($result) {
            Session::put('admin_account',$result->account);
            Session::put('admin_name',$result->name);
            Session::put('admin_id',$result->id);
            
            return Redirect::to('/dashboard');
        } else {
            Session::put('message','Đăng nhập thất bại. Vui lòng đăng nhập lại!!!');
            return Redirect::to('/admin');
        }
        
    }

    public function logout() {
        $this->authLogin();
      Session::put('admin_account',null);
      Session::put('admin_id',null);
      
      return Redirect::to('/admin');    

    }

    public function manage_order() {
        $this->authLogin();
        $all_order= DB::table('tbl_order')->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->select('tbl_order.*','tbl_customer.name')->orderBy('tbl_order.order_id','desc')->Paginate(10);
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('admin_layout')->with('admin.manage_order',$manager_order); 
    }

    public function view_order($order_id) {
        $this->authLogin();
        $order_by_id= DB::table('tbl_order')->where('tbl_order.order_id', $order_id)->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->select('tbl_order.*','tbl_customer.*')->get();
        
        $order_detail_by_id = DB::table('tbl_product_size')
        ->join('tbl_order_detail','tbl_product_size.product_size_id','=','tbl_order_detail.product_size_id')->where('tbl_order_detail.order_id', $order_id)
        ->join('tbl_product','tbl_product.product_id','=','tbl_product_size.product_id')
        ->select('tbl_order_detail.*','tbl_product_size.*','tbl_product.*')->get();
        // $product_name = DB::table('tbl_product_size')->join('tbl_product','tbl_product.product_id','=','tbl_product_size.product_id')->where()->get();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id)->with('order_detail',$order_detail_by_id);
        return view('admin_layout')->with('admin.view_order',$manager_order_by_id); 
    }
}
