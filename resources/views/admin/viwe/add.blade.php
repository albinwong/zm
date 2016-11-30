@extends('layout.admin')
@section('title','添加轮播')
@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="icon-add-contact">轮播添加</span>
    </div>
     <div class="mws-panel-body no-padding">
           

        <form class="mws-form" action="/viwe/insert" method="post" enctype="multipart/form-data">
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
                        <input class="small" type="text" name="intro" value="{{old('intro')}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图</label>
                    <div class="mws-form-item">
                        <input class="small" style="width:200px;" type="file" name="img">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">说明</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="info" value="{{old('info')}}">
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