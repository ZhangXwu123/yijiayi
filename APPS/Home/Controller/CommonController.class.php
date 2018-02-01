<?php

/* Function：公共调用模块
 * Date    : 2016-06-07 17:23
 * Person  : zhangwu
 */
namespace Home\Controller;
use Think\Controller;

define("sql_true"," switch = 'true'"); 
define("sql_tf"," (switch = 'true' or switch = 'false')"); 
define("thistime",time());
define("PR", C("DB_PREFIX"));
define("site","1");
define("tupain","__ROOT__");

define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../../../'))."/");

class CommonController extends Controller{
    
    public function __construct() {
        parent::__construct();
        $this->nav();
        $this->nav2();
        $this->getURL();
        
        if(!empty($_SESSION["MBusername"])){
            $login_status =1;
        }else{
            $login_status =0;
        }
        define("LoginS",$login_status);
        //基本设置
        $this->assign(array('logo'=>tupain.cfg_web_logo,'btitle'=>cfg_web_title,'rootURL'=>cfg_web_address,'wkeyworld'=>cfg_web_keyworld,'wdescription'=>cfg_web_description,'footinfo'=>cfg_web_footinfo,'beian'=>cfg_web_beian,'beian'=>cfg_web_beian,'Login'=>$this->a_url("","Home","Member","login","","",1),'Reg'=>$this->a_url("","Home","Member","reg","","",1),'LoginOut'=>$this->a_url("","Home","Member","loginout","","",1),'login_status'=>$login_status));
    }
    
       
    public function GetOne($sql,$G=0){
        $dosql = new \Think\Model(); 
        $result = $dosql->query($sql);
        return $result[0];
    }
    //执行sql
    public function query($sql,$G=0){
        $dosql = new \Think\Model(); 
        return $result = $dosql->query($sql);
    }
    
   //中文截取
    public function mb_str($str,$length){
        $str_length = mb_strlen($str,'utf-8');
        $_str = mb_substr($str,0,$length,"utf-8"); 
        if($str_length > $length){
           $_str .="..."; 
        }
        return $_str;
    }
    
    //顶部导航显示
    public function nav(){
        $navArr = $this->query("select * from `".PR."column` where ".sql_true." and siteid=".site." and pid=0 and show_weizhi like '%,2%' order by orderid asc ");
        $nav_str = "";
        $mo =I("mo","1");
        $cluinid =I("cluinid",1);
        $i  =1;
        foreach ($navArr as $key=>$v){
            if($key==0) $stick="class='stick'"; else $stick="";
            if(!empty($mo)  && $cluinid ==$v["id"]){
                $moC =" class='mo'";
            }else{
                $moC ="";
            }
            $nav_str .= '<a href="'.$v["url"].'" class="menu_item">'.$v["title"].'</a>';
            $i++;
        }
        $this->assign("nav",$nav_str);
    }
    //底部导航
    public function nav2(){
        $navArr = $this->query("select * from `".PR."column` where ".sql_true." and siteid=".site."  and pid=0  order by orderid asc ");
        $nav_str = "";
        $i  =1;
        foreach ($navArr as $key=>$v){
            if($key>0){
                $xg = '/';
            }else{
                $xg ='';
            }
            $nav_str .= $xg.'<a href="'.$v["url"].'&mo='.$i.'">'.$v["title"].'</a>';
            $i++;
        }
        $this->assign("nav2",$nav_str);
    }
    

        //定义URL路径
    public function a_url($URLname = "",$m="Admin",$model="", $action = "index", $join = "",$no_getarr=array(),$is=0) {
        $Root = $_SERVER["SCRIPT_NAME"] . "?m=$m&c=$model&a=$action";
        $url = "";
        if(!empty($_GET)){
            foreach ($_GET as $key=>$v){
              if(!$is){
                  if(empty($no_getarr) || (!empty($no_getarr) && !in_array($key,$no_getarr))){
                    $url .="&$key=".$v;   
                  }  
              }elseif($key =="mo"){
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
            $this->assign($URLname, "$URL_path");
        } else {
            return $URL_path;
        }
    }
    public function GetPage($sql,$pagenum=20){
        $model = new \Think\Model();
        $reuslt = $model->query($sql);
        $page      = I("get.p",0);
        $total     = count($reuslt);
        $nowurl    = $this->a_url("",MODULE_NAME,CONTROLLER_NAME,ACTION_NAME,'',array("p"));
        $totalpage =  ceil($total/$pagenum);
        if(!isset($page) || !intval($page) || $page<=0 || $page > $totalpage)
	{
           $page = 1;
	}
        $startnum = ($page-1) * $pagenum;
        $sql .= " limit $startnum, $pagenum";
        
        $pages = $this->pages($total,$pagenum, $page,$nowurl."&");
        $this->assign("page",$pages);
        
        return $model->query($sql);
    }
    
   //模板显示
    public function veiws($mod = "Index", $action = "home") {
        $head = $this->fetch("Public:head");
        $content = $this->fetch($mod . ":" . $action);
        $footer = $this->fetch("Public:footer");
        $html = $head . $content.$footer;
        $this->show($html);
    }
    //获取当当前URL
    public function getURL(){
       //echo MODULE_NAME." ".CONTROLLER_NAME."  ".ACTION_NAME;
      $input_  ='<input type="hidden" name="m" value="'.MODULE_NAME.'">';
      $input_ .='<input type="hidden" name="c" value="'.CONTROLLER_NAME.'">';
      $input_ .='<input type="hidden" name="a" value="'.ACTION_NAME.'">';
      $this->assign("_model",$input_);
      $this->assign("cURL",$_SERVER['REQUEST_URI']);
      return  $_SERVER['REQUEST_URI'];  
    }
    
    //获取上一个页面的URL $_SERVER['HTTP_REFERER'];
    public function lastURL(){
        return $_SERVER['HTTP_REFERER'];
    }
    
    //消息显示
    public function ShowMsgC($msg = '', $gourl = '-1', $del = "") {
        if ($gourl == '-1') {
            echo '<script>alert("' . $msg . '");history.go(-1);</script>';
        } else if ($gourl == '0') {
            echo '<script>alert("' . $msg . '");location.reload();</script>';
        } else {
            if ($msg == "") {
                echo '<script>location.href="' . $gourl . '";</script>';
            } else {
                if ($del) {
                    echo '<script>alert("' . $msg . '");top.tab_del(\'' . $del . '\')</script>';
                } else {
                    echo '<script>alert("' . $msg . '");location.href="' . $gourl . '";</script>';
                }
            }
        }
        exit;
    }

    //分页
    public function pages($total = "", $num = "", $page = "", $nowurl = "") {
        $pagetxt = '';
        $pagenum = $num; //每页显示条数
        $totalpage = ceil($total / $pagenum); //总页码数
        $previous = $page - 1;

        if ($totalpage == $page) {
            $next = $page;
        } else {
            $next = $page + 1;
        }
        if ($totalpage > 0) {
            $pagetxt = '<div class="pageList"><span style="color:#333; margin:2px 10px;">共'.$total.'条记录</span>';
            
            //上一页 第一页
            if ($page > 1) {
                $pagetxt .= '<a href="' . $nowurl . 'p=1">首页</a>';
                $pagetxt .= '<a href="' . $nowurl . 'p=' . $previous . '">上一页</a>';
            } else {
                $pagetxt .= '<a href="javascript:;">首页</a>';
                $pagetxt .= '<a href="javascript:;">上一页</a>';
            }

            //当总页数小于10
            if ($totalpage < 10) {
                for ($i = 1; $i <= $totalpage; $i++) {
                    if ($page == $i) {
                        $pagetxt .= '<a href="javascript:;" class="on">' . $i . '</a>';
                    } else {
                        $pagetxt .= '<a href="' . $nowurl . 'p=' . $i . '" class="num">' . $i . '</a>';
                    }
                }
            } else {
                if ($page == 1 or $page == 2 or $page == 3) {
                    $m = 1;
                    $b = 7;
                }
                //如果页面大于前三页并且小于后三页则显示当前页前后各三页链接
                if ($page > 3 and $page < $totalpage - 2) {
                    $m = $page - 3;
                    $b = $page + 3;
                }
                //如果页面为最后三页则显示最后7页链接
                if ($page == $totalpage or $page == $totalpage - 1 or $page == $totalpage - 2) {
                    $m = $totalpage - 7;
                    $b = $totalpage;
                }
                if ($page > 4) {
                    $pagetxt .= '<a href="javascript:;">...</a>';
                }
                //显示数字页码
                for ($i = $m; $i <= $b; $i++) {
                    if ($page == $i) {
                        $pagetxt .= '<a href="' . $nowurl . 'p=' . $i . '" class="on">' . $i . '</a>';
                    } else {
                        $pagetxt .= '<a href="' . $nowurl . 'p=' . $i . '" class="num">' . $i . '</a>';
                    }
                }
                if ($page < $totalpage - 3) {
                    $pagetxt .= '<a href="javascript:;">...</a>';
                }
            }

            //下一页 最后页
            if ($page < $totalpage) {
                $pagetxt .= '<a href="' . $nowurl . 'p=' . $next . '">下一页</a>';
                $pagetxt .= '<a href="' . $nowurl . 'p=' . $totalpage . '">尾页</a>';
            } else {
                $pagetxt .= '<a href="javascript:;">下一页</a>';
                $pagetxt .= '<a href="javascript:;">尾页</a>';
            }
            $pagetxt .= '</div>';
        }
        return $pagetxt;
    }
   
     
    
    //生成随机数
    public function getRandInt($length){
        $str = null;
        $strPol = "01234656789";
        $max = strlen($strPol)-1;

        for($i=0;$i<$length;$i++){
         $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
        }
        return $str;
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
    

     //文件上传
    public function uplodes($file="", $wjName = "",$member_id=0,$suolvtu=1){
	$_FILES =$file;
        $uptypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/gif', 'image/bmp', 'image/x-png');
        $max_file_size = 2000000;     //上传文件大小限制, 单位BYTE  
        $destination_folder = "$member_id/"; //上传文件路径  
        $error = 0;
        $error_txt = "";
        $success = "";
        $return_arr = array();

        if (!is_uploaded_file($_FILES["upfile"]["tmp_name"])) { //是否存在文件  
            $error = 1;
            $error_txt = "图片不存在!";
            $return_arr[0] = $error;
            $return_arr[1] = $error_txt;
            return $return_arr;
        }
        $file = $_FILES["upfile"];
        if ($max_file_size < $file["size"]) {  //检查文件大小  
            $error = 1;
            $error_txt = "文件太大!";
            $return_arr[0] = $error;
            $return_arr[1] = $error_txt;
            return $return_arr;
        }

        if (!in_array($file["type"], $uptypes)) { //检查文件类型  
            $error = 1;
            $error_txt = "文件类型不符!" . $file["type"];
            $return_arr[0] = $error;
            $return_arr[1] = $error_txt;
            return $return_arr;
        }

        $folder_path =  BASE_PATH.'/Public/upload/'.$destination_folder;
        
        if (!file_exists($folder_path)) {
            mkdir($folder_path,0700,TRUE);
        }
        $id = md5(md5($member_id));
        $filename = $file["tmp_name"];
        $image_size = getimagesize($filename);
        $pinfo = pathinfo($file["name"]);
        $ftype = $pinfo['extension'];
        $filenamepath = $wjName . "_" . $id . "." . $ftype;
        $destination = $folder_path . $filenamepath;
        if (file_exists($destination)) {
            unlink($destination);
        }
        if (!move_uploaded_file($filename, $destination)) {
            $error = 1;
            $error_txt = "移动文件出错!";
            $return_arr[0] = $error;
            $return_arr[1] = $error_txt;
            return $return_arr;
        }
        if($suolvtu)
        $this->img_create_small($destination,120,120,$folder_path.$wjName . "_" . $id . "_thumb." . $ftype);
        
        
        $pinfo = pathinfo($destination);
        $fname = $pinfo["basename"];
        $success =   '/Public/upload/' . $destination_folder . $filenamepath;
        $return_arr[0] = $error;
        $return_arr[1] = $error_txt;
        $return_arr[2] = $success;
        return $return_arr;  
        
    }
    
    public function img_create_small($big_img, $width, $height, $small_img) {//原始大图地址，缩略图宽度，高度，缩略图地址
        $imgage = getimagesize($big_img); //得到原始大图片
        switch ($imgage[2]) { // 图像类型判断
        case 1:
        $im = imagecreatefromgif($big_img);
        break;
        case 2:
        $im = imagecreatefromjpeg($big_img);
        break;
        case 3:
        $im = imagecreatefrompng($big_img);
        break;
        }
        $src_W = $imgage[0]; //获取大图片宽度
        $src_H = $imgage[1]; //获取大图片高度
        $tn = imagecreatetruecolor($width, $height); //创建缩略图
        imagecopyresampled($tn, $im, 0, 0, 0, 0, $width, $height, $src_W, $src_H); //复制图像并改变大小
        imagejpeg($tn, $small_img); //输出图像
    }
    
    
  
  public function GetVcode($num = 4, $size = 20, $width =90, $height = 0){
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
        @imagefttext($im, $size , 0, 5, $size + 3, $text_color, BASE_PATH.'/Public/Home/vcode/t1.ttf', $code);
        $_SESSION["VerifyCode"]=$code;
        header("Cache-Control:max-age=1,s-maxage=1,no-cache,must-revalidate");
        ob_clean();
        header("content-type:image/png\r\n");
        imagepng($im);
        imagedestroy($im);
  }
  
  
  public function cookie_login(){
        $rand = $_COOKIE["cookie_rand"];
        $cookie_mid = $_COOKIE["cookie_mid"];
        $cookie_randmid = $_COOKIE["cookie_randmid"];
        $member_row = $this->query("select * from `".PR."member` where  ".sql_true." and md5(id)='$cookie_mid' ");       
        $member_row =$member_row[0];
        if(!empty($member_row) && md5($member_row["id"].$rand) === $cookie_randmid){
                session('mid',$member_row["id"]); 
                session('member_username',$member_row["cnname"]);
                session('TongHangcard',$member_row["TongHangcard"]);
                session('mobile',$member_row["mobile"]);
                session('email',$member_row["email"]);
        }
        return TRUE;
  }
  
       
   public function LogTxt($log_txt="",$folder_file="log.txt"){
        $folder_path =BASE_PATH.'log/';
        if (!file_exists($folder_path)) {
            mkdir($folder_path,0777,TRUE);
        }
        $folder_path .= $folder_file;
        $handle = fopen($folder_path,"a");
        fwrite($handle,$log_txt);
        fclose($handle);
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
        //手机号验证
    public function mobile($mobile=""){
      if(!$mobile){
            return false; 
      }
      if(preg_match('/^(0|86|17951)?(13[0-9]|15[012356789]|1[78][0-9]|14[57])[0-9]{8}$/', $mobile)){
            return true;
      }else{
            return false;
      }
    }
}





