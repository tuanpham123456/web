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
            <!-- key word: validate form laravel : check lỗi request -->
            <div class="box-body">   
                <!-- @if ($errors->any())
                 <div class="alert alert-danger">
               <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                 </div>
                @endif                  -->
                    <form role="form" action="" method="POST">

                    <!-- @csrf ko bị lỗi  page expried  419 laravel -->
                    @csrf
                        <div class="col-sm-8">
                        <div class="form-group {{ $errors->first('c_name') ? 'has-error' : ''}}" >
                                <label for="nam">Name <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="c_name"  placeholder="Name ...">
                                @if ($errors->first('c_name'))
                                    <span class="text-danger">{{ $errors->first('c_name')}}</span>
                                @endif
                            </div>
                             
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="{{route('admin.category.index')}}" class="btn btn-danger"><i class="fa fa-undo"></i> Quay lại</a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu  <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
    </section>
    <!-- /.content -->
@stop