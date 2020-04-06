@extends('layouts.app_master_admin') 
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý danh mục sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.category.index') }}"> Category</a></li>
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
                    <h3 class="box-title"><a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Avatar</th>
                                    <th>Status</th>
                                    <th>Hot</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                @if ($categories)
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id}}</td>
                                    <td>{{ $category->c_name}}</td>
                                    <td>
                                        <img src="{{ asset('image/no-image.jpg')}}" style="width:80px;height:80px"></img>
                                    </td>
                                    <td>
                                        @if ($category->c_status == 1)
                                        <a href="{{ route('admin.category.active',$category->id)}}" class="label label-info">Show</a>
                                        @else
                                        <a href="{{ route('admin.category.active',$category->id)}}" class="label label-default">Hide</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($category->c_hot == 1)
                                        <a href="{{ route('admin.category.hot',$category->id)}}" class="label label-info">Hot</a>
                                        @else
                                        <a href="{{ route('admin.category.hot',$category->id)}}" class="label label-default">None</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $category->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.update',$category->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                        <a href="{{ route('admin.category.delete',$category->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                               @endif
                            </tbody>
                        </table>

                    </div>

                    <div class="box-footer">
                        {!! $categories->links() !!}
                    </div>

                </div>
    </section>
    <!-- /.content -->
@stop