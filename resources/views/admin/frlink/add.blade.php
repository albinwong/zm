@extends('layout.admin')

@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>添加友情链接</span>
    </div>
     <div class="mws-panel-body no-padding">
        <form class="mws-form" method="post" action="/frlink/add" enctype="multipart/form-data">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接名称</label>
                        <div class="mws-form-item">
                            <input class="small" name="linkname" type="text">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接地址</label>
                        <div class="mws-form-item">
                            <input class="small" name="url" type="text">
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">图标</label>
                        <div class="mws-form-item">
                            <input class="small" type="file" name="logo">
                        </div>
                     </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">网站描述</label>
                        <div class="mws-form-item">
                            <input class="small" name="content" type="text">
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
@endsection