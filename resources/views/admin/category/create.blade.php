@extends('layouts.app_master_admin')
 @section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm danh mục sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.category.index') }}"> Category</a></li>
            <li class="active"> Create</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            
                <div class="box-body">                    
                    <form role="form" action="" method="POST">
                        <div class="col-sm-8">
                        <div class="form-group">
                                <label for="nam">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="c_name"  placeholder="Name ...">
                            </div>
                             
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="{{route('admin.category.create')}}" class="btn btn-danger">Quay lại</a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu</button>
                            </div>
                        </div>
                    </form>
                </div>
    </section>
    <!-- /.content -->
@stop