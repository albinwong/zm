@extends('layout.admin')

@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>分类修改</span>
    </div>
     <div class="mws-panel-body no-padding">
           

        <form class="mws-form" action="/cate/update" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
            <div class="mws-form-message warning">
                @foreach ($errors->all() as $error)
                {{$error}}<br>
                @endforeach
            </div>
        @endif
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="name" value="{{$info->name}}">
                    </div>
                </div>
                
            <div class="mws-form-row">
				<label class="mws-form-label">父级分类</label>
				<div class="mws-form-item">
					<select class="small" name="pid">
						<option value="0">请选择:</option>
						@foreach($cates as $k=>$v)
						<option value="{{$v->id}}" @if($v->id == $info->pid) selected @endif >{{$v->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
            <div class="mws-button-row">  
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$info->id}}">
                <input value="修改" class="btn btn-danger" type="submit">
                <input value="重置" class="btn " type="reset">
            </div>
        </form>
    </div>      
</div>
@endsection