@extends('layout.home')

@section('title','商品评价')

@section('content')
<style type="text/css">
	.group{
		padding:20px;
	}

</style>
<form action="/review" method="post"  enctype="multipart/form-data">
<div class="container-fluid group">
	<div class="col-md-5 col-md-offset-4 starbox">
	   	<div class="col-md-3">整体评价:</div>
	   	<div class="col-md-5">
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star1" title="很差"></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star1" title="差" ></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star1" title="还行"></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star1" title="好"></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star1" title="很好"></div>
	   	</div>
	   	<div class="col-md-3 score1">请打分</div>
	</div>
</div>
<div class="container-fluid group">
	<div class="col-md-5 col-md-offset-4 starbox">
	   	<div class="col-md-3">商品质量:</div>
	   	<div class="col-md-5 square">
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star2" title="差"></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star2" title="一般"></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star2" title="好" ></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star2" title="很好"></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star2" title="非常好"></div>
	   	</div>
	   	<div class="col-md-3 score2">请打分</div>
	</div>
</div>
<div class="container-fluid group">
	<div class="col-md-5 col-md-offset-4 starbox">
	   	<div class="col-md-3">物流服务:</div>
	   	<div class="col-md-5 square">
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star3" title="差" ></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star3" title="一般" ></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star3" title="好" ></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star3" title="很好" ></div>
	   		<div class="col-md-2 glyphicon glyphicon-star-empty star3" title="非常好" ></div>
	   	</div>
	   	<div class="col-md-3 score3">请打分</div>
	</div>
</div>
<div class="container-fluid group">
	<div class="col-md-5 col-md-offset-4">
	   	<div class="col-md-3">内容评价:</div>
	   	<div class="col-md-6">
			<textarea name='content' rows="6" cols='25px'></textarea>
		</div>
	</div>
</div>
<div class="container-fluid group">
	<div class="col-md-5 col-md-offset-4">
		<div class="col-md-3">上传图片:</div>
	    <div class="col-md-6">
	    	<input type="file" id="exampleInputFile" name="pics[]" multiple>
	    </div>
	</div>
	<div class="col-md-8 col-md-offset-4 group">
		{{csrf_field()}}
        <input value="添加" class="btn btn-info" type="submit" style="width:400px;margin-top:20px;font-size:18px;font-weight:bold" value="提交评价">
	</div>
</div>
</form>
<script type="text/javascript">
$(function(){
	
	$('.star1').click(function(){
		$(this).removeClass('glyphicon glyphicon-star-empty').prevAll().removeClass('glyphicon glyphicon-star-empty');
		$(this).removeClass('glyphicon glyphicon-star').siblings().removeClass('glyphicon glyphicon-star').css('color','block');
		$(this).addClass('glyphicon glyphicon-star').css('color','red').prevAll().addClass('glyphicon glyphicon-star').css('color','red');
		$(this).addClass('glyphicon glyphicon-star').nextAll().addClass('glyphicon glyphicon-star-empty');	
		$('.score1').html($(this).attr('title')).css('color','#c00');
	});
	$('.star2').click(function(){
		$(this).removeClass('glyphicon glyphicon-star-empty').prevAll().removeClass('glyphicon glyphicon-star-empty');
		$(this).removeClass('glyphicon glyphicon-star').siblings().removeClass('glyphicon glyphicon-star').css('color','block');
		$(this).addClass('glyphicon glyphicon-star').css('color','red').prevAll().addClass('glyphicon glyphicon-star').css('color','red');
		$(this).addClass('glyphicon glyphicon-star').nextAll().addClass('glyphicon glyphicon-star-empty');	
		$('.score2').html($(this).attr('title')).css('color','#c00');
	});
	$('.star3').click(function(){
		$(this).removeClass('glyphicon glyphicon-star-empty').prevAll().removeClass('glyphicon glyphicon-star-empty');
		$(this).removeClass('glyphicon glyphicon-star').siblings().removeClass('glyphicon glyphicon-star').css('color','block');
		$(this).addClass('glyphicon glyphicon-star').css('color','red').prevAll().addClass('glyphicon glyphicon-star').css('color','red');
		$(this).addClass('glyphicon glyphicon-star').nextAll().addClass('glyphicon glyphicon-star-empty');	
		$('.score3').html($(this).attr('title')).css('color','#c00');
	});
});
</script>
@endsection