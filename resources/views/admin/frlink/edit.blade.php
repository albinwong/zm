@extends('layout.admin')

@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>修改友情链接模块</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" method="post" action="/frlink/edit">
                {{csrf_field()}}
                <input type="hidden" name = "id" value = "{{$list->id}}">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接名称</label>
                        <div class="mws-form-item">
                            <input class="small" name="linkname" type="text" value="{{$list->linkname}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">友情链接地址</label>
                        <div class="mws-form-item">
                            <input class="small" name="url" type="text" value="{{$list->url}}">
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">友情链接描述</label>
                        <div class="mws-form-item">
                            <input class="small" name="content" type="text" value="{{$list->content}}">
                        </div>
                    </div>
                <div class="mws-button-row">
                    <input value="提交" class="btn btn-danger" type="submit">
                    <a href="/admin/frlink/edit"><input value="重置" class="btn " type="button"></a>
                </div>
            </form>
        </div>      
    </div>
@endsection