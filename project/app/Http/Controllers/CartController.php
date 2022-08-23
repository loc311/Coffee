<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
session_start();

use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function save_cart(Request $request) {
      $productId = $request-> product_id_hidden;
      $quantity = $request ->qty;
      $product_size = $request ->product_size;
      $product_price = DB::table('tbl_product_size')->where('product_id',$productId)->where('product_size',$product_size)->first();


      $product_info= DB::table('tbl_product')->where('product_id',$productId)->first();
      
      $data['id'] = $product_price->product_size_id;  
      $data['name'] = $product_info->product_name; 
      $data['qty'] = $quantity;  
      $data['price'] = $product_price->product_price;  
      $data['weight'] = "0";
      $data['options']['image'] = $product_info->product_image; 
      $data['options']['size'] = $product_size; 

      Cart::setGlobalTax(0);
      Cart::add($data);
    
      return Redirect::to('/show_cart');
    }

    public function show_cart() {
      $cate = DB::table('tbl_category_product')->orderBy('category_id','desc')->get();
      
      return view('pages.cart.show_cart')->with('cate',$cate); 

    }

    public function delete_to_cart($rowId) {
      Cart::remove($rowId);
      return Redirect::to('/show_cart'); 

    }

    public function update1_to_cart($rowId,$qty) {
      Cart::update($rowId,($qty+1));
      return Redirect::to('/show_cart'); 

    }
    public function update2_to_cart($rowId,$qty) {
      if($qty<=1) {
        return Redirect::to('/show_cart'); 
      } else {
        Cart::update($rowId,($qty-1));
        return Redirect::to('/show_cart'); 
      }
    }
}
