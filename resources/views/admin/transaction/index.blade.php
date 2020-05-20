@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.transaction.index') }}"> Transaction</a></li>
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
                                    <th>Info</th>
                                    <th>Money</th>
                                    <th>Account</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                @if ($transactions)
                                @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->id}}</td>
                                    <td>
                                        <ul>
                                            <li>Name:    {{ $transaction->tst_name}}</li>
                                            <li>Email:   {{ $transaction->tst_email}}</li>
                                            <li>Phone:   {{ $transaction->tst_phone}}</li>
                                            <li>Address: {{ $transaction->tst_address}}</li>
                                        </ul>
                                    </td>
                                    <td>{{number_format( $transaction->tst_total_money,0,',','.')}}đ</td>
                                    <td>
                                        @if ($transaction->tst_user_id)
                                            <span class="label label-success">Thành viên</span>
                                        @else
                                            <span class="label label-default">Khách</span>

                                        @endif
                                    </td>
                                    <td>
                                        <span class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                                            {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $transaction->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.transaction.delete',$transaction->id)}}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                               @endif
                            </tbody>
                        </table>

                    </div>

                    <div class="box-footer">
                        {{-- {!! $transactionss->lintsts() !!} --}}

                    </div>

                </div>
    </section>
    <!-- /.content -->
@stop
