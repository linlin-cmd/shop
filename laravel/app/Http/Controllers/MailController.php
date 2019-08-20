<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){
    	$email ="bk122501@163.com";
    	$this->send($email);
    }
    public function send($email){
        \Mail::send('mail' , ['name'=>'!!!'] ,function($message)use($email){
        //设置主题
            $message->subject("恭喜您被清华大学所录取");
        //设置接收方
            $message->to($email);
        });
	}
}
