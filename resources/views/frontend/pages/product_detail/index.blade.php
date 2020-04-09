@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_detail.min.css') }}">
@stop
@section('content')
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
                    <h1>Đồng hồ Diamond D DD6014B</h1>
                    <div class="right__content">
                        <div class="info">
                            <div class="prices">
                                <p>Giá niêm yết: <span class="value">7.071.000 đ</span></p>
                                <p>
                                    Giá bán: <span class="value price-new">6.363.900 đ</span>
                                    <span class="sale">-10%</span>
                                </p>
                            </div>
                            <div class="btn-cart">
                                <a href="#" title="" onclick="add_cart_detail('17617',0);" class="muangay">
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
                                        <p class="text1">Xuất xứ:</p>
                                        <h3 class="text2">Áo</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Kiểu dáng:</p>
                                        <h2 class="text2">Đồng hồ Nữ</h2>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Năng lượng:</p>
                                        <h3 class="text2">Quartz/Pin</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Độ chịu nước:</p>
                                        <h3 class="text2">5 ATM</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Chất liệu mặt:</p>
                                        <h3 class="text2">Sapphire</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Đường kính mặt:</p>
                                        <h3 class="text2">30 mm</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Độ dầy:</p>
                                        <h3 class="text2"></h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Chất liệu dây:</p>
                                        <p class="text2">Stainless Steel</p>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Size dây:</p>
                                        <p class="text2"></p>
                                    </div>
                                </div>
                            </div>
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
                                    @for($i=0; $i < 8; $i++)
                                        <div class="item">
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