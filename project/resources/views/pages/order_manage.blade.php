@extends('welcome')
@section('content')

<div class="table-agile-info">
                    <div class="panel panel-default">                      
                       
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        
                                        <th>ID đơn hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tổng tiền</th>
                                        
                                        <th style="width:30px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_order as $key => $order)
                                    <tr>
                                        <!-- <td><label class="i-checks m-b-none"><input type="checkbox"
                                                    name="post[]"><i></i></label></td> -->
                                        <td>{{$order->order_id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->total_price}}</td>
                                        <!-- <td><span class="text-ellipsis">
                                            
                                        </span></td> -->
                                        
                                        <td style="font-size: 150%;">
                                            <a href="{{URL::to('/view_order_customer/'.$order->order_id)}}" class="active" ui-toggle-class="">
                                                <i class="fa fa-search text-success text-active"></i></a>
                                            <!-- <a href="{{URL::to('/delete_order/'.$order->order_id)}}" class="active" ui-toggle-class="" onclick="return confirm('Bạn muốn xóa đơn hàng này?')">
                                                <i class="fa fa-times text-danger text"></i></a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <footer class="panel-footer">
                            <div class="row">
                                <div style="text-align: center;">{{ $all_order->links() }}</div>
                            
                            
                            </div>
                        </footer>
                    </div>
                </div>

@endsection

