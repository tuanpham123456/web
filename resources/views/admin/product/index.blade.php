@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.product.index') }}"> roduct</a></li>
            <li class="active"> List</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('admin.product.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                         <table class="table">
                             <tbody>
                                 <tr>
                                     <th style="width: 10px">#</th>
                                     <th>Name</th>
                                     <th>Category</th>
                                     <th>Avatar</th>
                                     <th>Price</th>
                                     <th>Hot</th>
                                     <th>Status</th>
                                     <th>Action</th>
                                 </tr>

                             </tbody>
                             @if (isset($products))
                                     @foreach($products as $product)
                                         <tr>
                                             <td>{{ $product->id }}</td>
                                             <td>{{ $product->pro_name }}</td>
                                             <td>
                                                 <span class="label label-success">{{ $product->category->c_name ?? "[N\A]" }}</span>
                                             </td>
                                             <td>
                                                 <img src="{{ asset(pare_url_file($product->pro_avatar)) }}" style="width: 80px;height: 100px">
                                             </td>
                                             <td>
                                                 @if ($product->pro_sale)
                                                     <span style="text-decoration: line-through;">{{ number_format($product->pro_price,0,',','.') }} vnđ</span><br>
                                                     @php
                                                         $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                                     @endphp
                                                     <span>{{ number_format($price,0,',','.') }} vnđ</span>
                                                 @else
                                                     {{ number_format($product->pro_price,0,',','.') }} vnđ
                                                 @endif

                                             </td>
                                             <td>
                                                 @if ($product->pro_hot == 0)
                                                     <a href="{{ route('admin.product.hot', $product->id) }}" class="label label-info">Hot</a>
                                                 @else
                                                     <a href="{{ route('admin.product.hot', $product->id) }}" class="label label-default">None</a>
                                                 @endif
                                             </td>
                                             <td>
                                                 @if ($product->pro_active == 1)
                                                     <a href="{{ route('admin.product.active', $product->id) }}" class="label label-info">Active</a>
                                                 @else
                                                     <a href="{{ route('admin.product.active', $product->id) }}" class="label label-default">Hide</a>
                                                 @endif
                                             </td>
                                             <td>{{  $product->created_at }}</td>
                                             <td>
                                                 <a href="{{ route('admin.product.update', $product->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                 <a href="{{  route('admin.product.delete', $product->id) }}" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                             </td>
                                         </tr>
                                     @endforeach
                                 @endif
                         </table>
                     </div>
                 </div>
    </section>
    <!-- /.content -->
@stop
