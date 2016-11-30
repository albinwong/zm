@extends('layout.admin')
@section('title','轮播修改')
@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="icon-user">留言修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/viwe/update" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="mws-form-message warning">
                @foreach ($errors->all() as $error)
                    {{$error}}<br>
                @endforeach
            </div>
            @endif
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">简介</label>
                    <div class="mws-form-item">
                        <input class="small" name="intro" value="{{$res->intro}}">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">图片</label>
                    <div class="mws-form-item">
                        <img src="{{$res->img}}" width="200" alt="">
                        <input class="small" type="file" name="img">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">说明</label>
                    <div class="mws-form-item">
                        <input class="small" name="info" value="{{$res->info}}">
                    </div>
                </div>

            </div>
            <div class="mws-button-row">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$res->id}}">
                <input value="修改" class="btn btn-danger" type="submit">
                <input value="重置" class="btn " type="reset">
            </div>
        </form>
    </div>      
</div>

@endsection