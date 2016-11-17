@extends('layout.admin')

@section('content')

<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/admins/ueditor/lang/zh-cn/zh-cn.js"></script>

<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>菜品添加</span>
    </div>
     <div class="mws-panel-body no-padding">
           

        <form class="mws-form" action="/goods/insert" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <div class="mws-form-message warning">
                @foreach ($errors->all() as $error)
                {{$error}}<br>
                @endforeach
            </div>
        @endif
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">名称</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">价格</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="price">
                    </div>
                </div>
             
                <div class="mws-form-row">
                    <label class="mws-form-label">分类id</label>
                    <div class="mws-form-item">
                        <select class="small" name="cate_id">
                            <option value="0">请选择:</option>
                            @foreach($cates as $k=>$v)
                            <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">图片</label>
                    <div class="mws-form-item">
                        <input class="small" type="file" name="path[]" multiple> 
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">详情</label>
                    <div class="mws-form-item">
                        <script id="editor" name="detail" type="text/plain" style="width:800px;height:500px;"></script>
                    </div>
                </div>
            </div>

            <div class="mws-button-row">
                {{csrf_field()}}
                <input value="添加" class="btn btn-danger" type="submit">
                <input value="重置" class="btn " type="reset">
            </div>
        </form>
    </div>      
</div>
<script type="text/javascript">
     var ue = UE.getEditor('editor');
</script>
@endsection