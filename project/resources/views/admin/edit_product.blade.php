@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Cập nhật sản phẩm 
            </header>
            <div class="panel-body">
                <?php

                use Illuminate\Support\Facades\Session;

                    $message = Session::get('message');
                    if($message) {
                        echo $message;
                        Session::put('message',null);
                    }
                ?>
                <div class="position-center">
                    @foreach($edit_product as $key =>$pro)
                    <form role="form" action="{{URL::to('/update_product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" value="{{$pro->product_name}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" accept=".jpeg,.png,.jpg">
                            <img src="{{URL::to('upload/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none;" rows="8" type="text" name="product_desc" class="form-control" id="exampleInputPassword1">{{$pro->product_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Size</label>
                            <br>
                            @foreach($size_product as $key =>$pro_size)
                            <div class="col-sm-3">
                                <input type="hidden" name="size_id_{{$pro_size->product_size}}" value="{{$pro_size->product_size_id}}">
                                <span>{{$pro_size->product_size}}</span>
                                <input type="number" class="form-control" name="size_{{$pro_size->product_size}}" min="0" value="{{$pro_size->product_price}}">
                            </div>
                            @endforeach
                        </div>
                        <br> <br> <br>

                        <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key=>$cate )
                                @if ($cate->category_id==$pro->category_id)
                                <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
                                @endforeach
                                
                            </select>
                        </div>

                        <!-- <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                                
                            </select>
                        </div> -->
                        
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
    
</div>
@endsection