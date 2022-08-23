@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="container">
        <!--/breadcrums-->

        <div style="margin-bottom: 100px;">
            
            <div style="margin-bottom: 100px; border: 1px solid; padding-top: 30px; padding-bottom: 100px; font-size: 20px; box-shadow: gray 2px 2px 2px;">
                @foreach ($order_by_id as $key=>$value)

                <a target="blank" class="btn btn-default check_out" href="{{URL::to('/print_order/'.$value->order_id)}}">In hóa đơn</a>
                <br>
                <br>
                <div class="col-sm-12">
                    <span style="font-weight: bolder;">Số hóa đơn:</span> <span>{{$value->order_id}} </span>

                </div>
                <br>
                <div class="col-sm-12">
                    <span style="font-weight: bolder;">Ngày đặt hàng:</span> <span>{{date('d-m-Y H:i:s',$value->created_at)}} </span>

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
                <div class="col-sm-4">
                    <p style="font-weight: bolder;">Tổng tiền:</p>{{$value->total_price.' '.'VND'}} <span> </span>
                </div>

                @endforeach
            </div>
        </div>


    </div>
</section>

@endsection

