<?php

use Illuminate\Database\Seeder;

class GoodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
		for($i=0;$i<50;$i++){
			$tmp = [];
			$tmp['name'] = str_random(10);
			$tmp['price'] = rand(100,1000);
			$tmp['detail'] = str_random(100);
			$tmp['cate_id'] = rand(1,7);
			$tmp['kucun'] = rand(100,1000);
			$tmp['color'] = '红色@@@粉色@@@紫色@@@蓝色@@@黑色';
			$tmp['size'] = 's@@@l@@@m@@@xl@@@xxl@@@xxxl';
			$tmp['views'] = rand(1,1000);
			$data[] = $tmp;
		}
		DB::table('goods')->insert($data);
    }
}
