@extends('layouts.app_master_admin')
@section('content')
<section class="content-header">

    <h1>Thêm mới bài viết</h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{  route('admin.article.index') }}"> Article</a></li>
        <li class="active"> Create</a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row ">
        @include('admin.article.form');
    </div>
</section>
@stop
