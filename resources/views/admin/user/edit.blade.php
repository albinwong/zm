@extends('layout.admin')

@section('content')
<!-- 放置一个html表单 -->
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span class="icon-user">用户修改</span>
    </div>
    <div class="mws-panel-body no-padding">
           

    	<form class="mws-form" action="/user/update" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="mws-form-message warning">
                @foreach ($errors->all() as $error)
                	{{$error}}<br>
                @endforeach
            </div>
            @endif
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name="username" value="{{$user->username}}">
    				</div>
    			</div>
    			

    			<div class="mws-form-row">
    				<label class="mws-form-label">邮箱</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name="email" value="{{$user->email}}">
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">头像</label>
    				<div class="mws-form-item">
                        <img src="{{$user->profile}}" width="200" alt="">
    					<input class="small" type="file" name="profile">
    				</div>
    			</div>

                <div class="mws-form-row">
                    <label class="mws-form-label">地址</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="address" value="{{$user->address}}">
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">电话</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="phone" value="{{$user->phone}}">
                    </div>
                </div>

    		</div>
    		<div class="mws-button-row">
    			{{csrf_field()}}
                <input type="hidden" name="id" value="{{$user->id}}">
    			<input value="修改" class="btn btn-danger" type="submit">
    			<input value="重置" class="btn " type="reset">
    		</div>
    	</form>
    </div>    	
</div>

@endsection