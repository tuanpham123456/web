<form role="form" action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h3 class="box-title">Thông tin cơ bản</h3>
        </div>
        <div class="box-body">
            <div class="form-group ">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="a_name"
                    value="{{ $article->a_name ?? old('a_name')}}" placeholder="Iphone 5s ...." autocomplete="off" >
                @if ($errors->first('a_name'))
                <span class="text-danger">{{ $errors->first('a_name')}}</span>
                @endif
            </div>

            <div class="form-group ">
                <label for="exampleInputEmail1 ">Description</label>
                <textarea name="a_description" class="form-control"
                    cols="5 " rows="2 " autocomplete="off ">{{ $article->a_description ?? old('a_description')}}</textarea>
                @if ($errors->first('a_description'))
                <span class="text-danger">{{ $errors->first('a_description')}}</span>
                @endif
            </div>
            <div class="form-group ">
                <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
                <select name="a_menu_id" class="form-control ">
                    <option value="">__Click__</option>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->mn_name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->first('pro_category_id'))
                <span class="text-danger">{{ $errors->first('pro_category_id') }}</span>
                @endif
            </div>

                <hr>
                <div class="box-body">

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
                    <textarea name="a_content"  id="content" class="form-control textarea"
                        cols="5" rows="2">{{ $article->a_content ?? old('a_content')}}</textarea>
                    @if ($errors->first('a_content'))
                    <span class="text-danger">{{ $errors->first('pro_content')}}</span>
                    @endif
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
            <a href="{{ route('admin.article.index')}}" class="btn btn-danger"><i class="fa fa-undo"></i> Back</a>
            <button type="submit" class="btn btn-success">{{ isset($article) ? "Cập nhật " : "Thêm mới "}}<i class="fa fa-save"></i></button>
        </div>
    </div>
</form>
