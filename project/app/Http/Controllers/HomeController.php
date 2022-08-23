<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
             
        $all_product = DB::table('tbl_product')->orderBy('product_id','desc')->limit(6)->get();
        $price = DB::table('tbl_product_size')->get();
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $wishlist = DB::table('tbl_wishlist')->get();

        $best_wishlist = DB::table('tbl_wishlist')->select('tbl_wishlist.product_id','tbl_product.product_name','tbl_product.product_image',DB::raw('count(*) as id_count , tbl_wishlist.product_id'))->groupBy('tbl_wishlist.product_id','tbl_product.product_name','tbl_product.product_image')->orderBy('id_count','desc')->join('tbl_product','tbl_product.product_id', '=','tbl_wishlist.product_id')->limit(6)->get();
        
        
        return view('pages.home')->with('all_product',$all_product)->with('cate',$cate)->with('wishlist',$wishlist)->with('best_wishlist',$best_wishlist)->with('price',$price);
    }
    

    public function product()
    {
        $price = DB::table('tbl_product_size')->get();
        $all_product = DB::table('tbl_product')->orderBy('product_id','desc')->paginate(12);
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $wishlist = DB::table('tbl_wishlist')->get();
        return view('pages.product')->with('all_product',$all_product)->with('cate_product',$cate_product)->with('cate',$cate)->with('wishlist',$wishlist)->with('price',$price);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keyword.'%')->get();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $price = DB::table('tbl_product_size')->get();
        
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $wishlist = DB::table('tbl_wishlist')->get();
        return view('pages.product.search')->with('search_product',$search_product)->with('cate',$cate)->with('cate_product',$cate_product)->with('wishlist',$wishlist)->with('price',$price);
    }

    public function contact() {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

        return view('pages.contact')->with('cate',$cate);

    }
    public function about() {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

        return view('pages.about')->with('cate',$cate);

    }
    // lọc theo category
    public function show_category($category_id) {
        $price = DB::table('tbl_product_size')->get();

        $show_product = DB::table('tbl_product')->where('category_id',$category_id)->orderBy('product_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $wishlist = DB::table('tbl_wishlist')->get();
        return view('pages.category.show_category')->with('show_product',$show_product)->with('cate_product',$cate_product)->with('cate',$cate)->with('wishlist',$wishlist)->with('price',$price);
    }

    //wishlist
    public function add_wishlist($customerID,$productID) {
        $data = array();
        $data['customer_id'] = $customerID;
        $data['product_id'] = $productID;

        DB::table('tbl_wishlist')->insert($data);
        return redirect()->back();
    }

    public function remove_wishlist($customerID,$productID) {

        DB::table('tbl_wishlist')->where('customer_id',$customerID)->where('product_id',$productID)->delete();
        return redirect()->back();
    }

    public function wishlist()
    {   $customer_id = Session::get('customer_id');
        $price = DB::table('tbl_product_size')->get();
        
        
        $all_product = DB::table('tbl_wishlist')->join('tbl_product','tbl_product.product_id', '=','tbl_wishlist.product_id')->where('tbl_wishlist.customer_id',$customer_id)->orderBy('wishlist_id','desc')->paginate(12);
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        $wishlist = DB::table('tbl_wishlist')->get();
        return view('pages.wishlist')->with('all_product',$all_product)->with('cate_product',$cate_product)->with('cate',$cate)->with('wishlist',$wishlist)->with('price',$price);
    }

    //manage order
    public function order_manage() {
        $customer_id = Session::get('customer_id');
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        
        $all_order= DB::table('tbl_order')->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->where('tbl_order.customer_id',$customer_id)->select('tbl_order.*','tbl_customer.name')->orderBy('tbl_order.order_id','desc')->Paginate(10);
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);
        return view('pages.order_manage')->with('all_order',$all_order)->with('cate',$cate);
    }

    public function view_order_customer($order_id) {
        $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
        
        $order_by_id= DB::table('tbl_order')->where('tbl_order.order_id', $order_id)->join('tbl_customer','tbl_customer.customer_id','=','tbl_order.customer_id')->select('tbl_order.*','tbl_customer.*')->get();
        
        $order_detail_by_id = DB::table('tbl_product_size')
        ->join('tbl_order_detail','tbl_product_size.product_size_id','=','tbl_order_detail.product_size_id')->where('tbl_order_detail.order_id', $order_id)
        ->join('tbl_product','tbl_product.product_id','=','tbl_product_size.product_id')
        ->select('tbl_order_detail.*','tbl_product_size.*','tbl_product.*')->get();
        // $product_name = DB::table('tbl_product_size')->join('tbl_product','tbl_product.product_id','=','tbl_product_size.product_id')->where()->get();
        
        return view('pages.view_order_customer')->with('order_by_id',$order_by_id)->with('order_detail',$order_detail_by_id)->with('cate',$cate);
    }
}
