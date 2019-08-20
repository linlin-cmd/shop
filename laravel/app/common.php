<?php 
	//封装文件上传
    function upload($filename){
        if (request()->file($filename)->isValid()) {
             $photo = request()->file($filename);
             $store_result = $photo->store('','public');
             return  $store_result;
        }
            exit('未获取到上传文件或上传过程出错');
    }

    //无限极分类递归
    function createcat($data,$parent_id=0,$level=0){
        static $arr =[];
        foreach ($data as $key => $value) {
            if ($parent_id==$value->parent_id) {
                $value['level']=$level;
                $arr[] =$value;
                createcat($data,$value->cat_id,$level+1);
            }
        }
        return $arr;
    }
    //递归
    function createget($data,$parent_id){
        static $arr=[];
        foreach ($data as $value) {
            if ($parent_id ==$value->parent_id) {
                $arr[] =$value;
                createget($data,$value->cat_id);
            }
        }
        return $arr;
    }

        // //手机号
        // header("Content-Type:text/html;charset=UTF-8");
        // date_default_timezone_set("PRC");
        // $showapi_appid = '102826';  //替换此值,在官网的"我的应用"中找到相关值
        // $showapi_secret = '668bf71c0dcd455ca64e14090410e781';  //替换此值,在官网的"我的应用"中找到相关值
        // $paramArr = array(
        // 'showapi_appid'=> $showapi_appid,
        //                 'content'=> "您好,[name],验证码是[code], 本次登录密码有效时间为[minute]分钟",
        //                 'title'=> "某某公司名称",
        //                 'notiPhone'=> "15035431038"
        // //添加其他参数
        // );

        // //创建参数(包括签名的处理)
        // function createParam ($paramArr,$showapi_secret) {
        // $paraStr = "";
        // $signStr = "";
        // ksort($paramArr);
        // foreach ($paramArr as $key => $val) {
        // if ($key != '' && $val != '') {
        // $signStr .= $key.$val;
        // $paraStr .= $key.'='.urlencode($val).'&';
        // }
        // }
        // $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
        // $sign = strtolower(md5($signStr));
        // $paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
        // echo "排好序的参数:".$signStr."\r\n";
        // return $paraStr;
        // }

        // $param = createParam($paramArr,$showapi_secret);
        // $url = 'http://w3.laravel.cn/email?'.$param;
        // echo "请求的url:".$url."\r\n";
        // $result = file_get_contents($url);
        // echo "返回的json数据:\r\n";
        // print $result.'\r\n';
        // $result = json_decode($result);
        // echo "\r\n取出showapi_res_code的值:\r\n";
        // print_r($result->showapi_res_code);
        // echo "\r\n";
 ?>