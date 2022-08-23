<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Barryvdh\DomPDF\Facade\PDF;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout() {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('cate',$cate);
    }

    public function logout_checkout() {
        Session::flush();
        return Redirect::to('/trang_chu');
    }

    public function add_customer(Request $request) {
        $phone = $request->customer_phone;
        $check_phone = DB::table('tbl_customer')->where('phone',$phone)->first();
        if($check_phone){
            Session::put('message','Tài khoản đã tồn tại!!');  
        }
        else {
        $data = array();
        $data['name'] = $request->customer_name;
        $data['phone'] = $request->customer_phone;
        $data['password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_phone',$request->customer_phone);
        Session::put('customer_name',$request->customer_name);
        Session::put('message','Tạo tài khoản thành công!!');  
        }
        return redirect()->back();

    }

    public function password_customer() {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

        return view('pages.password_customer')->with('cate',$cate);
    }

    public function customer(Request $request) {
        $customer_id = Session::get('customer_id');
        $password_old = md5($request->customer);
        $password_z =  DB::table('tbl_customer')->where('password',$password_old)->where('customer_id',$customer_id)->first();
        $password_new = md5($request->customer_password);
        if($password_z != NULL) {
            if($password_new!=$password_old) {
                $data = array();    
                $data['password'] = md5($request->customer_password);
        
                DB::table('tbl_customer')->where('customer_id', $customer_id)->update($data);
                Session::put('message','Đổi mật khẩu thành công!!');
            }
            else{
                Session::put('message','Mật khẩu mới không được trùng mật khẩu cũ!!');
            }
            
        }
        else {
            Session::put('message','Mật khẩu cũ không đúng!!');
        }
        
        return redirect()->back();

    }

    public function checkout() {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('cate',$cate);
        
    }

    public function login_customer(Request $request) {
        
        
        $phone = $request->phone_account;
        $password = md5($request->password_account);
        
        $result = DB::table('tbl_customer')->where('phone',$phone)->where('password',$password)->first();

        if($result) {
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->name);
            Session::put('customer_phone',$result->phone);
            return redirect()->back();
        }
        else {
            Session::put('message','Đăng nhập thất bại, vui lòng thử lại!!');
            
            return redirect()->back();
        }
             
    }

    public function save_order(Request $request) {
        // insert order
        $data = array();     
        $data['total_price'] = Cart::total();
        $temp_note = $request->order_note;

        if($temp_note) {
        $data['order_note'] = $request->order_note;
          
        }
        else {
        $data['order_note'] = 'Không';
        }

        $data['order_address'] = $request->order_address;
        $data['customer_id'] = Session::get('customer_id');
        $data['date'] = Carbon::now('Asia/Ho_Chi_Minh');
        
        $order_id = DB::table('tbl_order')->insertGetId($data);
        Session::put('order_id',$order_id);

        //insert order detail
		$content = Cart::content();
        foreach($content as $v_value) {
            $order_data = array();
            $order_data['order_id'] = $order_id;
            $order_data['product_size_id'] = $v_value->id;
            $order_data['quantity'] = $v_value->qty;
            DB::table('tbl_order_detail')->insert($order_data);
        }
        
        Cart::destroy();

        return Redirect::to('/payment');
    }

    public function payment() {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $order_id=Session::get('order_id');
        $order_by_id= DB::table('tbl_order')->where('tbl_order.order_id', $order_id)->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->select('tbl_order.*','tbl_customer.*')->get();
        
        $order_detail_by_id = DB::table('tbl_product_size')
        ->join('tbl_order_detail','tbl_product_size.product_size_id','=','tbl_order_detail.product_size_id')->where('tbl_order_detail.order_id', $order_id)
        ->join('tbl_product','tbl_product.product_id','=','tbl_product_size.product_id')
        ->select('tbl_order_detail.*','tbl_product_size.*','tbl_product.*')->get();
             
        return view('pages.checkout.payment')->with('order_by_id',$order_by_id)->with('order_detail',$order_detail_by_id)->with('cate',$cate);

    }

    //pdf
    public function print_order($checkout_code) {
        $pdf = \App::make('dompdf.wrapper');
        $pdf-> loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();
    }

    public function print_order_convert($checkout_code) {
        $order_by_id= DB::table('tbl_order')->where('tbl_order.order_id', $checkout_code)->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->select('tbl_order.*','tbl_customer.*')->get();
        
        $order_detail_by_id = DB::table('tbl_product_size')
        ->join('tbl_order_detail','tbl_product_size.product_size_id','=','tbl_order_detail.product_size_id')->where('tbl_order_detail.order_id', $checkout_code)
        ->join('tbl_product','tbl_product.product_id','=','tbl_product_size.product_id')
        ->select('tbl_order_detail.*','tbl_product_size.*','tbl_product.*')->get();
        
        $output = '';
        $output.='
        <style>
            body { font-family:DejaVu Sans;}
        </style>

        <div style="margin-bottom: 100px; border: 1px solid; padding-top: 30px; padding-left: 30px; padding-bottom: 100px; font-size: 20px; box-shadow: gray 2px 2px 2px;">';
        foreach ($order_by_id as $key=>$value) {

        
        $output.='
        <div class="col-sm-2"><img src="../public/image/logo.png" style="width: 30%;" /></div>
        <div class="col-sm-8"><h2 style="text-align: center;">Cup Coffee</h2></div>
        
        <div class="col-sm-12">
            <span style="font-weight: bolder;">Số hóa đơn:</span> <span>'.$value->order_id.' </span>

        </div>
        <br>
        <div class="col-sm-12">
            <span style="font-weight: bolder;">Ngày đặt hàng:</span> <span>'.$value->date.'</span>
        </div>
        <br>
        <div class="col-sm-6">
            <span style="font-weight: bolder;">Tên khách hàng:</span> <span>'.$value->name .'</span>
        </div>

        <div class="col-sm-6">
            <span style="font-weight: bolder;">Số điện thoại:</span> <span>'.$value->phone .'</span>
        </div>
        <br> <br>
        <div class="col-sm-12">
            <span style="font-weight: bolder;">Địa chỉ giao hàng:</span> <span>'.$value->order_address .'</span>
        </div>
        <br> <br>
        <div class="col-sm-12">
            <span style="font-weight: bolder;">Ghi chú đơn hàng:</span> <span>'.$value->order_note .'</span>
        </div>
        <br> <br>';
        
        foreach ($order_detail_by_id as $key=>$detail){
            $output.='
        <div class="col-sm-12">
            <div class="col-sm-6">
                <span style="font-weight: bolder;">Sản phẩm:</span> <span>'.$detail->product_name .'</span>
            </div>
            <div class="col-sm-3">
                <span style="font-weight: bolder;">Size:</span> <span>'.$detail->product_size .'</span>
            </div>
            <div class="col-sm-3">
                <span style="font-weight: bolder;">Số lượng:</span> <span>'.$detail->quantity .'</span>

            </div>
        </div>
        <br> <br>';
        }
        $output.='
        <div class="col-sm-4">
            <p style="font-weight: bolder;">Tổng tiền:</p>'.$value->total_price." "."VND" .'<span> </span>
        </div>';

        
    }
        $output.='
        
    </div>';
        return $output;
    }
}
