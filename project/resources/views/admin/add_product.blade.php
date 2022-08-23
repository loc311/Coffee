@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Thêm sản phẩm
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
                    <form role="form" action="{{URL::to('/save_product')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label> <span style="color: red;">*</span>
                            <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label> <span style="color: red;">*</span>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" required accept=".jpeg,.png,.jpg">
                        </div>

                        

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label> <span style="color: red;">*</span>
                            <textarea style="resize: none;" rows="8" type="text" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Size</label>
                            <br>
                            <div class="col-sm-3">
                                <span>S</span>
                                <input type="number" class="form-control" name="size_s" min="0">
                            </div>
                            <div class="col-sm-3">
                                <span>M</span>
                                <input type="number" class="form-control" name="size_m"  min="0">
                            </div>
                            <div class="col-sm-3">
                                <span>L</span>
                                <input type="number" class="form-control" name="size_l"  min="0">
                            </div>
                        </div>
                        <br> <br> <br>
                        <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key=>$cate )
                                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
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
                        
                        <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    
</div>
@endsection