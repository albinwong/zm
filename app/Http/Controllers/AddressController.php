<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class AddressController extends Controller
{
	/**
	 * 添加
	 */
	public function add()
	{
		return view('home.address.add');
	}
}	