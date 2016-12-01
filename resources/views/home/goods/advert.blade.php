<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		*{margin:0px;padding:0px;list-style:none;}
		#content{
			width:130px;
			height:240px;
			border:solid 1px #ddd;
			margin: 0 auto;
			/*position:absolute;*/
			position: fixed;
			overflow: hidden;
			right: 0px;
		}
		#imgs li{
			position:absolute;
			right:0px;
			top:0px;
			overflow: hidden;
		}
		
		#numb{
			position:absolute;
			z-index:10;
			width:120px;
			right:0px;
			bottom:10px;
		}

		#numb li{
			width:18px;
			height:18px;
			background:#222;
			border-radius:50%;
			color:white;
			float:left;
			margin-right:10px;
			text-align:center;
			line-height:18px;
			font-size:12px;
			cursor:pointer;
		}

		#imgs .active{
			z-index:9;
		}

		#numb .active{
			background:#b61b1f none repeat scroll 0 0;
		}
		#delete{
			color:red;
			font-size:20px;
			z-index:5;
			position: fixed;
			margin-left:110px;
			cursor:pointer;
		}
	</style>
</head>
<body>
	<div id="content">
		<div id="delete">X</div>
		<ul id="imgs">
			<li><a target="_blank" href="http://go.sogou.com"><img src="/Uploads/14800775774028518.jpg"></a></li>
			<li><a target="_blank" href="http://www.ctrip.com/"><img src="/Uploads/14800840093226983.jpg"></a></li>
			<li><a target="_blank" href="https://www.qunar.com/"><img src="/Uploads/14800840478870358.jpg"></a></li>
			<li><a target="_blank" href="http://www.ly.com"><img src="/Uploads/14802953246061209.jpg"></a></li>
		</ul>

		<ul id="numb">
			<li>1</li>			
			<li>2</li>			
			<li>3</li>			
			<li>4</li>						
		</ul>
	</div>
	<script src="/homes/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		var index = 0;//正在显示的图片的索引
		setInterval(function(){
			index++;
			//隐藏所有的图片
			$('#imgs li').fadeOut(200);
			//显示当前这个索引的图片
			$('#imgs li').eq(index).fadeIn(200);
			//小图标
			$('#numb li').removeClass();
			$('#numb li').eq(index).addClass('active');

			if(index >= 3){
				index = -1;
			}
		}, 3000);
		//绑定事件
		$('#content').click(function(){
			$(this).remove();
		});
		//获取删除元素 然后绑定事件
		$('#content').find('.delete').click(function(){
			$(this).parent().remove();
			return false;
		});
	</script>
</body>
</html>