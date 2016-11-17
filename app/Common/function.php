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
 ?>