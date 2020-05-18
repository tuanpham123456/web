@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/cart.min.css') }}">
@stop
@section('content')
    <div class="container cart">
        <div class="left">
            <div class="list">
                <div class="title">THÔNG TIN GIỎ HÀNG</div>
                <div class="list__content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($shopping as $item )
                            <tr>
                                <td>
                                    <a href="{{ route('get.product.detail',Str::slug($item->name).'-'.$item->id)}}"
                                    title="{{$item->name}}" class="avatar image contain">
                                        <img alt="" src="{{ asset(pare_url_file($item->options->image)) }}" class="lazyload">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('get.product.detail',Str::slug($item->name).'-'.$item->id)}}"><strong>{{ $item->name}}</strong></a>
                                </td>
                                <td>
                                    <p><b>{{ number_format($item->price,0,',','.')}} đ</b></p>
                                    <p><span class="sale">- {{ $item->options->sale}}</span></p>
                                </td>
                                <td>
                                    <input type="number" min="1" class="input_quantity" name="quantity_14692" value="{{ $item->qty}}" id="">
                                    <input type="button" class="update_qty btn btn-danger fff" value="Cập nhật" >
                                </td>
                                <td>
                                   {{ number_format($item->price * $item->qty,0,',','.')}} đ
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p style="float:right; margin-top:20px">Tổng tiền: <b>{{Cart::subtotal(0)}}</b></p>

                </div>

            </div>
        </div>
        <div class="right">
            <div class="customer">
                <div class="title">THÔNG TIN ĐẶT HÀNG</div>
                <div class="customer__content">
                    <form class="from_cart_register" action="" method="post">
                        <div class="form-group">
                            <label for="name" >Họ và tên <span class="cRed">(*)</span></label>
                            <input name="name" id="name" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                            <input name="phone" id="phone" type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="cRed">(*)</span></label>
                            <input name="address" id="address" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="cRed">(*)</span></label>
                            <input name="email" id="email" type="text" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú thêm</label>
                            <textarea name="note" id="note" cols="3" rows="2" style="min:height:100px" class="form-control"></textarea>
                        </div>
                        <div class="btn-buy">
                            <button class="buy1 btn btn-purple" name="payment" value="1" type="submit">
                                Thanh toán khi nhận hàng
                            </button>
                            <button class="btn btn-purple " name="payment" value="2" type="submit">
                                <span class="">Thanh toán online</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>
@stop
