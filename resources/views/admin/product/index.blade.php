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
                                    <th>Avatar</th>
                                    <th>Description</th>
                                    <th>Hot</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                 @if (isset($products))
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id}}</td>
                                    <td>{{ $product->pro_name}}</td>
                                    <td>
                                        <img src="{{ asset(pare_url_file($product->pro_avatar))}}" style="width:80px;height:80px">
                                    </td>
                                    <td>{{ $product->pro_description}}</td>
                                    <td>
                                        @if ($product->pro_hot == 0)
                                        <a href="{{ route('admin.product.hot',$product->id)}}" class="label label-info">Hot</a>
                                        @else
                                        <a href="{{ route('admin.product.hot',$product->id)}}" class="label label-default">None</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($product->pro_active == 1)
                                        <a href="{{ route('admin.product.active',$product->id)}}" class="label label-info">Active</a>
                                        @else
                                        <a href="{{ route('admin.product.active',$product->id)}}" class="label label-default">Hide</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $product->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.product.update',$product->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                        <a href="{{ route('admin.product.delete',$product->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                               @endif
                            </tbody>
                        </table>

                    </div>

                    <div class="box-footer">
                    </div>

                </div>
    </section>
    <!-- /.content -->
@stop