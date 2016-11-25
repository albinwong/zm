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
	function getAreaName($id)
	{
		$res = DB::table('destoon_area')->where('areaid',$id)->first();
		
		
		return $res->areaname;
	}
	function getOnePicByGoodsId($goods_id)
	{
		return DB::table('pics')->where('goods_id',$goods_id)->value('path');
	}

	function getStatusNameById($id)
	{
		switch ($id) {
			case '0':
			case '1':
				return '待付款';
				break;
			case '2':
				return '已付款';
				break;
			case '3':
				return '已派送';
				break;
			case '4':
				return '待评价';
				break;
			default:
				
				break;
		}
	}
 ?>