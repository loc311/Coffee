<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ProductController extends Controller
{
    //
    public function authLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    public function add_product()
    {
        $this->authLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();

        return view('admin.add_product')->with('cate_product', $cate_product);
    }

    public function all_product()
    {
        $this->authLogin();
        $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->orderBy('tbl_product.product_id', 'desc')->Paginate(10);
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->authLogin();

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        //'category_id' là tên cột trong bảng,product_cate là name bên form;

        // $request->validate([
        //     'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        // ]);
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();

            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
            $product_id = DB::table('tbl_product')->insertGetId($data);

            $data_size = array();
            if ($request->size_s) {
                $data_size['product_price'] = $request->size_s;
                $data_size['product_size'] = 'S';
                $data_size['product_id'] = $product_id;
                DB::table('tbl_product_size')->insert($data_size);
            }
            if ($request->size_m) {
                $data_size['product_price'] = $request->size_m;
                $data_size['product_size'] = 'M';
                $data_size['product_id'] = $product_id;
                DB::table('tbl_product_size')->insert($data_size);
            }
            if ($request->size_l) {
                $data_size['product_price'] = $request->size_l;
                $data_size['product_size'] = 'L';
                $data_size['product_id'] = $product_id;
                DB::table('tbl_product_size')->insert($data_size);
            }

            Session::put('message', 'Thêm sản phẩm thành công!!');
            return Redirect::to('add_product');
        }
        // $data['product_image'] = '';
        // DB::table('tbl_product')->insert($data);
        // Session::put('message', 'Thêm sản phẩm thành công!!');
        // return Redirect::to('add_product');
    }

    //edit
    public function edit_product($product_id)
    {
        $this->authLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $size_product = DB::table('tbl_product_size')->where('product_id', $product_id)->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)->with('size_product', $size_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    // update
    public function update_product(Request $request, $product_id)
    {
        $this->authLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        $get_image = $request->file('product_image');

        if ($get_image) {
            //xóa ảnh cũ
            $product_image = DB::table('tbl_product')->where('product_id', $product_id)->first();
            unlink("upload/product/{$product_image->product_image}");

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . '.' . $get_image->getClientOriginalExtension();

            $get_image->move('upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            $data_size = array();
            if ($request->size_S) {
                $size_id = $request->size_id_S;
                $data_size['product_price'] = $request->size_S;
                
                DB::table('tbl_product_size')->where('product_size_id', $size_id)->update($data_size);
            }
            if ($request->size_M) {
                $size_id = $request->size_id_M;
                $data_size['product_price'] = $request->size_M;
                
                DB::table('tbl_product_size')->where('product_size_id', $size_id)->update($data_size);
            }
            if ($request->size_L) {
                $size_id = $request->size_id_L;
                $data_size['product_price'] = $request->size_L;
                
                DB::table('tbl_product_size')->where('product_size_id', $size_id)->update($data_size);
            }

            Session::put('message', 'Cập nhật sản phẩm thành công!!');
            return Redirect::to('all_product');
        } else {
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            $data_size = array();
            if ($request->size_S) {
                $size_id = $request->size_id_S;
                $data_size['product_price'] = $request->size_S;
                
                DB::table('tbl_product_size')->where('product_size_id', $size_id)->update($data_size);
            }
            if ($request->size_M) {
                $size_id = $request->size_id_M;
                $data_size['product_price'] = $request->size_M;
                
                DB::table('tbl_product_size')->where('product_size_id', $size_id)->update($data_size);
            }
            if ($request->size_L) {
                $size_id = $request->size_id_L;
                $data_size['product_price'] = $request->size_L;
                
                DB::table('tbl_product_size')->where('product_size_id', $size_id)->update($data_size);
            }
            Session::put('message', 'Cập nhật sản phẩm thành công!!');
            return Redirect::to('all_product');
        }
    }

    //delete
    public function delete_product($product_id)
    {
        $this->authLogin();
        $product_image = DB::table('tbl_product')->where('product_id', $product_id)->first();

        unlink("upload/product/{$product_image->product_image}");
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        DB::table('tbl_product_size')->where('product_id', $product_id)->delete();
        Session::put('message', 'Xóa sản phẩm thành công!!');
        return Redirect::to('all_product');
    }

    // product detail
    public function detail_product($product_id)
    {
        $price = DB::table('tbl_product_size')->get();

        $cate = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();
        $wishlist = DB::table('tbl_wishlist')->get();
        $size = DB::table('tbl_product_size')->where('product_id',$product_id)->orderBy('product_size_id', 'asc')->get();
        $size2 = DB::table('tbl_product_size')->where('product_id',$product_id)->orderBy('product_size_id', 'asc')->get();

        $detail_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->where('tbl_product.product_id', $product_id)->get();
        //lấy sản phẩm cùng category id
        foreach ($detail_product as $key => $value) {
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();
        //whereNotIn('tbl_product.product_id',[$product_id]) để bỏ các sp có id đã lấy
        return view('pages.product.show_detail')->with('product_detail', $detail_product)->with('relate', $related_product)->with('cate', $cate)->with('cate_product', $cate_product)->with('size',$size)->with('size2',$size2)->with('wishlist',$wishlist)->with('price',$price);
    }
}
