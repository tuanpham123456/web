@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
    @include('frontend.components.slider')
    <div class="container">
        <div class="logo-partner">
            @for($i = 0; $i < 6; $i++)
                <div class="item">
                    <a href="#" title="Đồng hồ Atlantic Swiss">
                        <img class="lazyload" src="https://www.dangquangwatch.vn/view/Pic/Jacques.jpg" data-src="" alt="Atlantic Swiss" />
                    </a>
                </div>
            @endfor
        </div>
        <div class="product-one">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM MỚI</a>
                <ul class="top__tab">
                    <li data-id="proNewst1" class="active"><a href="javascript://" title="">Tất cả</a></li>
                    <li data-id="proNewst2"><a href="javascript://" title=""><h2>Đồng hồ nam</h2></a></li>
                    <li data-id="proNewst3"><a href="javascript://" title=""><h2>Đồng hồ nữ</h2></a></li>
                </ul>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="#" title="" class="" target="_blank">
                            <img class="lazyload" alt="" src="https://www.dangquangwatch.vn/upload/homeads/686416914_dong-ho-nhap-khau102.jpg" />
                        </a>
                    </div>
                </div>
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    @for($i=0; $i < 5; $i++)
                        <div class="item">
                            @include('frontend.components.product_item')
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        @include('frontend.pages.home.include._inc_flash_sale')

        <div class="product-two">
            <div class="top">
            </div>
            <div class="bot">
                @for($i=0; $i < 4; $i++)
                    <div class="item">
                        @include('frontend.components.product_item')
                    </div>
                @endfor
            </div>
        </div>

        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM MỚI</a>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="#" title="" class="" target="_blank">
                            <img class="lazyload" alt="" src="https://www.dangquangwatch.vn/upload/homeads/686416914_dong-ho-nhap-khau102.jpg" />
                        </a>
                    </div>
                </div>
                <div class="right">
                    @for($i=0; $i < 4; $i++)
                        <div class="item">
                            @include('frontend.components.product_item')
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM MỚI</a>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="#" title="" class="" target="_blank">
                            <img class="lazyload" alt="" src="https://www.dangquangwatch.vn/upload/homeads/686416914_dong-ho-nhap-khau102.jpg" />
                        </a>
                    </div>
                </div>
                <div class="right">
                    @for($i=0; $i < 4; $i++)
                        <div class="item">
                            @include('frontend.components.product_item')
                        </div>
                    @endfor
                </div>
            </div>
        </div>

        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title">ĐỒNG HỒ ATLANTIC SWISS</a>
            </div>
            <div class="bot">
                @for($i=0; $i < 4; $i++)
                    <div class="item">
                        @include('frontend.components.product_item')
                    </div>
                @endfor
            </div>
        </div>

        <div class="product-five">
            <div class="top">
                <a href="#" class="main-title">ĐỒNG HỒ ARIES GOLD</a>
            </div>
            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                @for($i=0; $i < 8; $i++)
                    <div class="item">
                        @include('frontend.components.product_item')
                    </div>
                @endfor
            </div>
        </div>

        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title">ĐỒNG HỒ ARIES GOLD</a>
            </div>
            <div class="bot">
                @for($i=0; $i < 4; $i++)
                    <div class="item">
                        @include('frontend.components.product_item')
                    </div>
                @endfor
            </div>
        </div>
    </div>
@stop

@section('script')
    <script src="{{ asset('js/home.js') }}" type="text/javascript"></script>
@stop