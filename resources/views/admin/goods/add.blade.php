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
    		<div class="mws-form-message error">
            	 @foreach ($errors->all() as $error) 
	                {{ $error }}
	             @endforeach
            </div>
           @endif
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">菜品名称</label>
    				<div class="mws-form-item">
    					<input class="small" type="text" name="name" value="{{old('name')}}">
    				</div>
    			</div>
                <div class="mws-form-row">
                    <label class="mws-form-label">菜品单价</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="price" value="{{old('price')}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">菜品库存</label>
                    <div class="mws-form-item">
                        <input class="small" type="text" name="kucun" value="{{old('kucun')}}">
                    </div>
                </div>
               <div class="mws-form-row">
                    <label class="mws-form-label">菜系</label>
                    <div class="mws-form-item">
                        <select class="small" name="cate_id">
                            <option value="0">请选择菜系</option><button type="button">添加菜系</button>
                            @foreach ($cates as $k=>$v)
                                <option value="{{$v->id}}">{{$v->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
                <div class="mws-form-row">
                    <label class="mws-form-label">菜品图片</label>
                    <div class="mws-form-item" style="width:455px;!important">
                        <input  type="file" name="path[]" multiple>
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">详情</label>
                    <div class="mws-form-item">
                        <script id="editor" name="detail" type="text/plain" style="width:730px;height:300px;"></script>
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