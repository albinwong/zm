@extends('layout.admin')

@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span class="icon-add-contact">广告添加</span>
    </div>
     <div class="mws-panel-body no-padding">
           

        <form class="mws-form" action="/advert/insert" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <div class="mws-form-message warning">
                @foreach ($errors->all() as $error)
                {{$error}}<br>
                @endforeach
            </div>
        @endif
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">标题</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="title" value="{{old('title')}}">
                    </div>
                </div>
  
               <div class="mws-form-row">
                    <label class="mws-form-label">图片</label>
                    <div class="mws-form-item" style="width:500px">
                        <input class="small" type="file" name="pics">
                    </div>
                </div>
                


                <div class="mws-form-row">
                    <label class="mws-form-label">链接地址</label>
                    <div class="mws-form-item">
                        <input class="small" name="url" type="text">
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