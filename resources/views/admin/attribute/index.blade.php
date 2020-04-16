@extends('layouts.app_master_admin') 
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý thuộc tính</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.keyword.index') }}"> Attribute</a></li>
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
                    <h3 class="box-title"><a href="{{route('admin.keyword.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                         <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Hot</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                {{-- @if ($keywords)
                                @foreach ($keywords as $keyword)
                                <tr>
                                    <td>{{ $keyword->id}}</td>
                                    <td>{{ $keyword->k_name}}</td>
                                    <td>{{ $keyword->k_description}}</td>

                                   
                                    
                                    <td>
                                        @if ($keyword->k_hot == 0)
                                        <a href="{{ route('admin.keyword.hot',$keyword->id)}}" class="label label-info">Hot</a>
                                        @else
                                        <a href="{{ route('admin.keyword.hot',$keyword->id)}}" class="label label-default">None</a>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $keyword->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.keyword.update',$keyword->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a>
                                        <a href="{{ route('admin.keyword.delete',$keyword->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                               @endif --}}
                            </tbody>
                        </table>

                    </div>

                    <div class="box-footer">
                        {{-- {!! $categories->links() !!} --}}
                    </div>

                </div>
    </section>
    <!-- /.content -->
@stop