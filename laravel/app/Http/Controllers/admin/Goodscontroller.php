<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Goodscontroller extends Controller
{
    public function index(){
    	return view('admin/index/index');
    }
    public function head(){
    	return view('admin/index/head');
    }
    public function left(){
    	return view('admin/index/left');
    }
    public function main(){
    	return view('admin/index/main');
    }
}
