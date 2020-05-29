@extends('layouts.app_master_frontend')
@section('css')
<link rel="stylesheet" href="{{ asset('css/product_detail.min.css') }}"> @stop @section('content')
<div class="container">
    <div class="breadcrumb">
        <ul>
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a itemprop="url" href="https://www.dangquangwatch.vn/" title="Home"><span itemprop="title">Trang chủ</span></a>
            </li>
            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a itemprop="url" href="https://www.dangquangwatch.vn/sp/dong-ho-thuy-sy.html" title="Đồng hồ chính hãng"><span itemprop="title">Đồng hồ chính hãng</span></a>
            </li>

            <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a itemprop="url" href="https://www.dangquangwatch.vn/sp/Dong-ho-Diamond-D.html" title="Đồng hồ Diamond D"><span itemprop="title">Đồng hồ Diamond D</span></a>
            </li>

        </ul>
    </div>
    <div class="card">
        <div class="card-body info-detail">
            <div class="left">
                <div class="slider-pro" id="my-slider">
                    <div class="sp-slides">
                        <!-- Slide 1 -->
                        <div class="sp-slide">
                            <img class="sp-image" src="{{ url('images/banner/dongho.jpg') }}" alt="">
                        </div>
                        <div class="sp-slide">
                            <img class="sp-image" src="{{ url('images/banner/dongho.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="sp-thumbnails">
                        <img class="sp-thumbnail" src="{{ url('images/banner/dongho.jpg') }}" />
                        <img class="sp-thumbnail" src="{{ url('images/banner/dongho.jpg') }}" />
                    </div>
                </div>
            </div>
            <div class="right">
                <h1>{{ $product->pro_name}}</h1>
                <div class="right__content">
                    <div class="info">

                        <div class="prices">

                            @if ($product->pro_sale)
                            <p>Giá niêm yết: <span class="value">{{ number_format($product->pro_price,0,',','.') }} đ</span></p>

                            @php $price = ((100 - $product->pro_sale) * $product->pro_price) / 100 ; @endphp
                            <p>
                                Giá bán: <span class="value price-new"> {{number_format($price,0,',','.')}} đ</span>
                                <span class="sale">-{{$product->pro_sale}}%</span>
                            </p>

                            @else
                            <p>
                                Giá bán: <span class="value price-new"> {{ number_format($product->pro_price,0,',','.')}} đ</span>
                            </p>

                            @endif

                        </div>
                        <div class="btn-cart">
                            <a href="{{ route('get.shopping.add',$product->id)}}" title="" onclick="add_cart_detail('17617',0);" class="muangay">
                                <span>Mua ngay</span>
                                <span>Hotline: 1800.6005</span>
                            </a>
                            <a href="#" title="" onclick="add_cart_detail('17617',1);" class="muatragop">
                                <span>Mua trả góp 0%</span>
                                <span>Visa, Master, JCB</span>
                            </a>
                        </div>
                        <div class="infomation">
                            <h2 class="infomation__title">Thông số kỹ thuật</h2>
                            <div class="infomation__group">

                                <div class="item">
                                    <p class="text1">Danh mục</p>
                                    <h3 class="text2">
                                        @if ( isset($product->category->c_name))
                                            <a href="{{route('get.category.list',$product->category->c_slug)}}">{{ $product->category->c_name}}</a>
                                        @else
                                        "[N\A]"
                                        @endif

                                    </h3>
                                </div>
                                <div class="item">
                                    <p class="text1">Xuất xứ</p>
                                    <h3 class="text2">{{$product->getCountry($product->pro_country)}}</h3>
                                </div>
                                <div class="item">
                                    <p class="text1">Năng lượng</p>
                                    <h2 class="text2">{{ $product->pro_energy}}</h2>
                                </div>
                                <div class="item">
                                    <p class="text1">Độ chịu nước</p>
                                    <h3 class="text2">{{$product->pro_resistant}}</h3>
                                </div>
                                <div class="item">
                                    <p class="text1">Độ chịu nước:</p>
                                    <h3 class="text2">5 ATM</h3>
                                </div>

                            </div>
                        </div>
                        @if (isset($product->keywords))
                        <div class="infomation" style="margin-top:20px">
                            <h2 class="infomation_title">Keyword</h2>
                            <div class="infomation_group">
                                <div class="item">
                                    @foreach ($product->keywords as $keyword)
                                    <a href="" style="border:1px solid #E91E65;display:inline-block;font-size:13px;padding:0 5px;margin-right:10px;color:#E91E63;border-radius:5px">
                                        {{$keyword->k_name}}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="ads">
                        <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%" src="{{ url('images/banner/dongho.jpg') }}"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body product-des">
            <div class="left">
                <div class="tabs">
                    <div class="tabs__content">
                        <div class="product-five">
                            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                                @for($i=0; $i
                                < 8; $i++) <div class="item">
                                    @include('frontend.components.product_item')
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right">
            <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%" src="{{ url('images/banner/dongho.jpg') }}"></a>
        </div>
    </div>
</div>
</div>

@stop
@section('script')
<script src="{{ asset('js/product_detail.js') }}" type="text/javascript"></script>
@stop
