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


	
	function getAreaName($id)
	{
		$res = DB::table('destoon_area')->where('areaid',$id)->first();
		$res = $res->areaname;
		return $res;
	}
	function getOnePicByGoodsId($goods_id)
	{
		return DB::table('pics')->where('goods_id',$goods_id)->value('path');
	}

	function getStatusNameById($id)
	{
		switch ($id) {
			case '0':return '待付款';break;
			case '1':return '已付款';break;
			case '2':return '待收货';break;
			case '3':return '已收货,待评价';break;
			default:return '完成';break;
		}
	}

	// 判断留言的类型
	function getNotesType($id)
	{
		switch($id){
			case '1':return '投诉';break;
			case '2':return '建议';break;
			case '3':return '意见';break;
			default:return '咨询';break;
		}
	}

 ?>