@extends('layout.admin')

@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="icon-user">留言修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/msg/update" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="mws-form-message warning">
                @foreach ($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
            @endif
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">留言ID</label>
                    <div class="mws-form-item">
                        <input class="small" style="width:100px;" disabled value="{{$data->id}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">留言编号</label>
                    <div class="mws-form-item">
                        <input class="small" style="width:100px;" disabled value="{{$data->mid}}">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">邮箱</label>
                    <div class="mws-form-item">
                        <input class="small" disabled value="{{$data->email}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input class="small" disabled value="{{$data->title}}">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">内容</label>
                    <div class="mws-form-item">
                        <textarea name="" id="" disabled cols="100" rows="10">&emsp;&emsp;{{$data->content}}</textarea>
                    </div>
                </div>

                
                <div class="mws-form-row">
                    <label class="mws-form-label">回复</label>
                    <div class="mws-form-item">
                        <textarea name="reply" id="" cols="100" rows="10">{{$data->reply}}</textarea>
                    </div>
                </div>

            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$data->id}}">
                <input value="修改" class="btn btn-danger" type="submit">
                <input value="重置" class="btn " type="reset">
            </div>
        </form>
    </div>      
</div>

@endsection