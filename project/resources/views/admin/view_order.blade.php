@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Chi tiết đơn hàng
        </div>
        <?php

        use Illuminate\Support\Facades\Session;

        $message = Session::get('message');
        if ($message) {
            echo $message;
            Session::put('message', null);
        }
        ?>

        <div class="table-responsive">
            @foreach ($order_by_id as $key=>$value)
            <div class="col-sm-12">
                <span style="font-weight: bolder;">Số hóa đơn:</span> <span>{{$value->order_id}} </span>

            </div>
            <br>
            <div class="col-sm-12">
                <span style="font-weight: bolder;">Ngày đặt hàng:</span> <span>{{$value->date}} </span>
                </div>
                <br>
            <div class="col-sm-6">
                <span style="font-weight: bolder;">Tên khách hàng:</span> <span>{{$value->name}} </span>
            </div>
            
            <div class="col-sm-6">
                <span style="font-weight: bolder;">Số điện thoại:</span> <span>{{$value->phone}} </span>
            </div>
            <br> <br>
            <div class="col-sm-12">
                <span style="font-weight: bolder;">Địa chỉ giao hàng:</span> <span>{{$value->order_address}} </span>
            </div>
            <br> <br>
            <div class="col-sm-12">
                <span style="font-weight: bolder;">Ghi chú đơn hàng:</span> <span>{{$value->order_note}} </span>
            </div>
            <br> <br>
            @foreach ($order_detail as $key=>$detail)
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <span style="font-weight: bolder;">Sản phẩm:</span> <span>{{$detail->product_name}} </span>
                </div>
                <div class="col-sm-3">
                    <span style="font-weight: bolder;">Size:</span> <span>{{$detail->product_size}} </span>
                </div>
                <div class="col-sm-3">
                    <span style="font-weight: bolder;">Số lượng:</span> <span>{{$detail->quantity}} </span>

                </div>
            </div>
            <br> <br>
            @endforeach
            <div class="col-sm-8">

            </div>
            <div class="col-sm-4">
                <p style="font-weight: bolder;">Tổng tiền:</p>{{$value->total_price}} <span> </span>
            </div>
            
            @endforeach
        </div>

    </div>
</div>
@endsection