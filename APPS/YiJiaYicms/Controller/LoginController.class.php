<?php
namespace YiJiaYicms\Controller;
use Think\Controller;

class LoginController extends  Controller{
    public function __construct() {
            parent::__construct();
            unset($_SESSION["adminid"]);
            unset($_SESSION["username"]);
            define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../../../'))."/");
    }
    public function index(){
            $this->a_url("login_url","YiJiaYicms","Login","prologin",'','',1);
            $this->a_url("vcode","YiJiaYicms","Login","vcode","","",1);
             $this->show($this->fetch("Login:index"));
    }
    /**
     * 后台登录
     *
     */
    public function prologin(){
        $name= $this->inject_check(trim(I("username")));
        $pwd=I("password");
        $pwd=  trim($pwd);
        $vcode=I("vcode","");
        $g = I('g');
        $admin = new \Think\Model(); 
        if(!empty($name)){
           $n_sql .= "  username='$name' "; 
        }
        if(empty($vcode)){
                if(!BACKJSON){
                     $this -> error("请输入验证码！");
                }else{
                     exit(json_encode(array("error"=>201,"error_txt"=>"请输入验证码！")));
                }
        }
        if(strtolower($vcode) != strtolower($_SESSION["VerifyCode"])){
                if(!BACKJSON){
                     $this -> error("验证码错误，请重新输入！");
                }else{
                     exit(json_encode(array("error"=>202,"error_txt"=>"验证码错误，请重新输入！")));
                }
        }
        $data = $admin ->query("select * from `yiyi_admin` where ($n_sql) and (switch='true' or switch='false')  ");
        $data =$data[0];
        if(!empty($data["switch"])){
			if($data["switch"] == "false"){
                                if(!BACKJSON){
                                        $this -> error("账号已禁用！");
                                }else{
                                        exit(json_encode(array("error"=>205,"error_txt"=>"账号已禁用！")));
                                }
			}elseif($data["switch"] !="true"){
                                                if(!BACKJSON){
                                                        $this -> error("账号不存在！");
                                                }else{
                                                        exit(json_encode(array("error"=>206,"error_txt"=>"账号不存在！")));
                                                }
			}
        }
        if($data){
            $admin_password = $data["password"];
            $admin_salts    = $data["salts"];
            $salts          = $this->getRandChar(4);
            
            $logintime =time();
            $loginip =$this->GetIP();
            
            $last_logintime =$data["logintime"];
            $last_loginip = $data["loginip"];
            
            if($data["switch"]!="true"){
                        if(!BACKJSON){
                                $this -> error("用户已禁用或删除，登录失败！");
                        }else{
                                exit(json_encode(array("error"=>207,"error_txt"=>"用户已禁用或删除，登录失败！")));
                        }
                        exit();
            }
            $shalpwd = sha1(sha1($pwd).$admin_salts);
            if($admin_password != $shalpwd){
                        if(!BACKJSON){
                                $this -> error("密码错误，登录失败！");
                        }else{
                                exit(json_encode(array("error"=>208,"error_txt"=>"密码错误，登录失败！")));
                        }
            }
            $admin->query("update `yiyi_admin` set password='".sha1(sha1($pwd).$salts)."',logintime='$logintime',loginip='$loginip',last_logintime='$last_logintime',last_loginip='$last_loginip',salts='$salts',uptime='".time()."' where id=".$data["id"]." ");
            session('username',"{$data['username']}");
            session('adminid',"{$data['id']}");
            unset($_SESSION["VerifyCode"]);
            if(!BACKJSON){
                    header('Location: ' .$this->a_url("","YiJiaYicms","Index","index",'','',1));
            }else{
                    exit(json_encode(array("error"=>0,"success"=>"登录成功！")));
            }
        }else{
                if(!BACKJSON){
                        $this -> error("账号不存在，登录失败！");
                }else{
                        exit(json_encode(array("error"=>208,"error_txt"=>"账号不存在，登录失败！")));
                }
        }
       exit();
    }
     public function inject_check($sql_str) {    
        $str = $sql_str;
        if (!get_magic_quotes_gpc()) {    // 判断magic_quotes_gpc是否打开      
          $str = addslashes($str);    // 进行过滤      
        }      
        $str = str_replace("_", "\_", $str);    // 把 '_'过滤掉      
        $str = str_replace("%", "\%", $str);    // 把 '%'过滤掉     
        $str = str_replace("%", "\%", $str);    // 把 '%'过滤掉     
        $str = str_replace("select",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("insert",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("update",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("delete",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("union",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("into",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("load_file",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("outfile",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("or",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("and",",", $str);    // 把 '%'过滤掉     
        $str = str_replace("'","`", $str);    // 把 '%'过滤掉     
        $str = str_replace("\"","`", $str);    // 把 '%'过滤掉     
        return $str;    // 进行过滤      
    }  
    
       //生成随机数
    public function getRandChar($length){
        $str = null;
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
         $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
    }
    
        //获取IP
    public function GetIP() {
        static $ip = NULL;
        if ($ip !== NULL)
            return $ip;

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr);
            if (false !== $pos)
                unset($arr[$pos]);
            $ip = trim($arr[0]);
        }
        else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        //IP地址合法验证
        $ip = (false !== ip2long($ip)) ? $ip : '0.0.0.0';
        return $ip;
    }
    //定义URL路径
    public function a_url($URLname = "",$m="YiJiaYicms",$model="", $action = "index", $join = "",$no_getarr=array(),$is=0) {
        $m = $m;
        $Root = $_SERVER["SCRIPT_NAME"] . "?m=$m&c=$model&a=$action";
        $url = "";
 
        if(!$is && !empty($_GET)){
            foreach ($_GET as $key=>$v){
              if(empty($no_getarr) || (!empty($no_getarr) && !in_array($key,$no_getarr))){
                $url .="&$key=".$v;   
              }  
            } 
        }
        
        if ($join) {
            $URL_path = $Root . $join;
        } else {
            $URL_path = $Root;
        }
        $URL_path .=$url;
        if ($URLname) {
            unset($_GET);
            $this->assign($URLname, "$URL_path");
        } else {
            return $URL_path;
        }
    }
        
    public function vcode() {
                $num = 4; $size = 20; $width =90; $height = 0;
                !$width && $width = $num * $size * 4 / 5 + 5;
                !$height && $height = $size + 10; 
                // 去掉了 0 1 O l 等
                $str = "23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVW";
                $code = '';
                for ($i = 0; $i < $num; $i++) {
                    $code .= $str[mt_rand(0, strlen($str)-1)];
                } 
                // 画图像
                $im = imagecreatetruecolor($width, $height); 
                // 定义要用到的颜色
                $back_color = imagecolorallocate($im, 235, 236, 237);
                $boer_color = imagecolorallocate($im, 118, 151, 199);
                $text_color = imagecolorallocate($im, mt_rand(0, 200), mt_rand(0, 120), mt_rand(0, 120)); 
                // 画背景
                imagefilledrectangle($im, 0, 0, $width, $height, $back_color); 
                // 画边框
                imagerectangle($im, 0, 0, $width-1, $height-1, $boer_color); 
                // 画干扰线
                for($i = 0;$i < 5;$i++) {
                    $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
                    imagearc($im, mt_rand(- $width, $width), mt_rand(- $height, $height), mt_rand(30, $width * 2), mt_rand(20, $height * 2), mt_rand(0, 360), mt_rand(0, 360), $font_color);
                } 
                // 画干扰点
                for($i = 0;$i < 50;$i++) {
                    $font_color = imagecolorallocate($im, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
                    imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $font_color);
                } 
                // 画验证码
                @imagefttext($im, $size , 0, 5, $size + 3, $text_color, BASE_PATH.'/Public/vcode/t1.ttf', $code);
                $_SESSION["VerifyCode"]=$code;
                header("Cache-Control:max-age=1,s-maxage=1,no-cache,must-revalidate");
                ob_clean();
                header("content-type:image/png\r\n");
                imagepng($im);
                imagedestroy($im);
    }
    
}