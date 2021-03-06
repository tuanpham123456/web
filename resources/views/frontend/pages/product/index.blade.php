    @extends('layouts.app_master_frontend')
    @section('css')
        <link rel="stylesheet" href="{{ asset('css/product_search.min.css') }}">
        <style type="text/css">
            .pagination{
                margin: 10px auto;
                display:   flex;
                margin-left: 9px;
            }
            .pagination li{
                padding: 5px;
                margin: 0 2px;
                border: 1px solid #dedede;
            }
            .pagination li a .pagination li span{
                line-height: 25px;
                display: block;
                text-align: center;
                width: 25px;
                height: 25px;
            }

        </style>
    @stop
    @section('content')
        <div class="container">
            <div class="product-list">
                <div class="left">
                    @include('frontend.pages.product.include._inc_sidebar')
                </div>
                <div class="right">
                {{-- breadcrumb --}}
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
                {{-- end breadcrumb --}}
                    <div class="filter-tab">
                        <ul>
                            @for($i =0; $i < 5; $i++)
                                <li>
                                    <label>
                                        <input type="checkbox" value="16">
                                        <span>Giá &lt; 2 triệu</span>
                                    </label>
                                </li>
                            @endfor
                        </ul>
                    </div>

                    <div class="order-tab">
                        <span class="total-prod">Tổng số: {{$products->total()}} sản phẩm Tính năng</span>
                        <div class="sort">
                            <div class="item">
                                <span class="title">Sắp xếp <i class="fa fa-caret-down"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="group">
                        @foreach ($products as $product)
                        @include('frontend.components.product_item',['product' => $product])
                        @endforeach
                    </div>
                    <div style="display:block" class="pagination">
                        {!! $products->appends([])->links() !!}
                    </div>
                </div>
            </div>
        </div>
    @stop
    @section('script')
        <script src="{{ asset('js/product_search.js') }}" type="text/javascript"></script>
    @stop
