<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChangController extends Controller
{
    public function chang()
    {
         return view('home.changj.chang');
    }
}
