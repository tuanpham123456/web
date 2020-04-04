@extends('layouts.app_master_admin')
 @section('content')
<section class="content-header">
        <h1>Thêm danh mục từ khóa</h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{  route('admin.keyword.index') }}"> Keyword</a></li>
            <li class="active"> Create</a>
            </li>
        </ol>
    </section>
<form role="form" action="" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="col-sm-8">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="pro_name" placeholder="Iphone 5s ...." autocomplete="off" ">
                    
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                             <input type="text" name="pro_price"  class="form-control" data-type="currency" placeholder="15.000.000">
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giảm giá</label>
                             <input type="number" name=""  class="form-control" data-type="currency" placeholder="5">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="tag">Keyword</label>
                            <select name="keywords" class="form-control js-select2-keyword" multiple="">
                                <option value="">__Click__</option>
                               
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="pro_description_seo" class="form-control" cols="5" rows="2" autocomplete="off"></textarea>
                   
                </div>
            
                <div class="form-group ">
                    <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
                    <select name="" class="form-control ">
                        <option value="">__Click__</option>
                        
                    </select>
                    
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thuộc tính</h3>
            </div>
            <div class="box-body">
                    <div class="form-group col-sm-3">
                        <h4 style="border-bottom: 1px solid #dedede;padding-bottom: 10px;"></h4>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="attribute[]"
                                value=""> 
                            </label>
                         </div>
                    </div>
            </div>
            <hr>
            <div class="box-header with-border">
                <h3 class="box-title">Album ảnh</h3>
            </div>
            <div class="box-body">
               
                    <div class="row" style="margin-bottom: 15px;">
                        
                            <div class="col-sm-2">
                                <a href="" style="display: block;">
                                    <img src="" style="width: 100%;height: auto">
                                </a>
                            </div>
                        
                    </div>
                
                 <div class="form-group">
                    <div class="file-loading">
                        <input id="images" type="file" name="file[]" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
                    </div>
                </div>
            </div>
            <hr>
            <div class="box-body">
                <div class="form-group col-sm-3">
                    <label for="exampleInputEmail1">Xuất sứ</label>
                    <select name="pro_country" class="form-control ">
                        <option value="0">__Click__</option>
                        <option value="1" >Việt nam</option>
                        <option value="2" >Anh</option>
                        <option value="3" >Thuỵ Sỹ</option>
                        <option value="4" >Mỹ</option>
                    </select>
                </div>
                <div class="form-group col-sm-3">
                    <label >Năng lượng</label>
                    <input type="text"  class="form-control" name="" value=" " placeholder="Năng lượng">
                </div>
                <div class="form-group col-sm-3">
                    <label for="">Độ chịu nước</label>
                    <input type="text"  class="form-control" name="" value="" placeholder="Độ chịu nước">
                </div>
                <div class="form-group col-sm-3">
                    <label for="">Số lượng</label>
                    <input type="number"  class="form-control" name="" value="" placeholder="10">
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Content</label>
                    <textarea name="pro_content" id="content" class="form-control textarea" cols="5" rows="2" ></textarea>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div style="margin-bottom: 10px"> <img src="" onerror="this.onerror=null;this.src='';" alt="" class="img-thumbnail" style="width: 200px;height: 200px;"> </div>
                <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;"> Choose File... <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="pro_avatar" size="40" class="js-upload"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 clearfix">
        <div class="box-footer text-center">
            <a href="" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>  </button> </div>
    </div>
</form>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

{{-- <div class="box-header with-border">
        <h3 class="box-title">Album ảnh</h3>
    </div>
    <div class="box-body">
         <div class="form-group">
            <div class="file-loading">
                <input id="images" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
            </div>
        </div>
    </div> --}}
@stop