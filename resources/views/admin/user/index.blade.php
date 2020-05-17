@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý thành viên</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href=""> User</a></li>
            <li class="active"> List</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <div class="col-md-12">
                         <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>

                                @if ($users)
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->phone}}</td>
                                    <td>
                                        {{ $user->created_at}}
                                    </td>
                                    <td>
                                        {{-- <a href="" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Update</a> --}}
                                        <a href="{{route('admin.user.delete',$user->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

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
