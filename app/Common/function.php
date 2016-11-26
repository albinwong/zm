<?php 

	function getCateName($id)
	{
		if($id == 0){
			return '顶级分类';
		}
		//读取分类信息
		$info = DB::table('cates')->where('id',$id)->first();
		//返回结果
		return $info->name;
	}

	function getUserAuth($id)
	{
		switch ($id) {
			case '0':return '未激活';break;
			case '1':return '会员';break;
			default:return '管理员';break;
		}
	}
	
	function getSendStatus($send)
	{
		switch($send){
			case '1':return '准备出库';break;
			case '2':return '已发货';break;
			case '3':return '已到货';break;
		}
	}


 ?>