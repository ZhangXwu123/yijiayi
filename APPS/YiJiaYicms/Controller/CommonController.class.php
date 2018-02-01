<?php

/* Function：公共调用模块
 * Date    : 2016-06-07 17:23
 * Person  : zhangwu
 */
namespace YiJiaYicms\Controller;
use Think\Controller;

define("sql_true"," switch = 'true'"); 
define("sql_tf"," (switch = 'true' or switch = 'false')"); 
define("thistime",time());
define("PR", C("DB_PREFIX"));

if($_SESSION["adminid"]){
    define("adminid",$_SESSION["adminid"]);
}else{
    define("adminid",0); 
}
define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/../../../'))."/");
define("MODULE_NAME2",MODULE_NAME);

class CommonController extends Controller{
    
    public function __construct() {
        parent::__construct();
        $this->getURL();
        $login_out_url  = $this->a_url("","YiJiaYicms","Login","index",'','',1);
        $INDEX_URL      = $this->a_url("","YiJiaYicms","Index","index",'','',1);
        if(!$_SESSION['adminid']){
                if(!BACKJSON){
                        $this->ShowMsgC("",$login_out_url);
                }else{
                        exit(json_encode(array("error"=>1,"error_txt"=>"没有登录或者登录已超时，须重新登录系统！")));
                }
        }
       
        $ROOT = $this->getConfig("web_address");
        $username = $_SESSION["username"];
       if(empty($admin_row)){
            $admin_row = $this->GetOne("select * from `".PR."admin` where id=".adminid." ");
            if($admin_row["switch"] !="true"){
                    if(!BACKJSON){
                            $this->ShowMsgC("",$login_out_url);
                    }else{
                            exit(json_encode(array("error"=>2,"error_txt"=>"该账号已禁用，不能操作系统！")));
                    }
            }
            define("sys", $admin_row["sys"]);
            define("admingroup", $admin_row["admingroup"]);
            $adminlevel = $this->GetOne("select level from `".PR."admin_group` where id=".admingroup." ");
            define("adminlevel", $adminlevel["level"]);
       }
       $this->assign(array("admin_username"=>$username,'login_out_url'=>$login_out_url,'root'=>$ROOT,'INDEX_URL'=>$INDEX_URL));
       
       $this->level();
       $this->menu();
       $this->PostRequireAndGetRequire();
        //echo MODULE_NAME." ".CONTROLLER_NAME."  ".ACTION_NAME;
    }
    
        //执行sql
    public function query($sql,$G=0){
            $dosql = new \Think\Model(); 
            return $result = $dosql->query($sql);
    }
    public function GetOne($sql,$G=0){  
            $dosql = new \Think\Model(); 
            $result = $dosql->query($sql);
            return $result[0];
    }
    
    public function PostRequireAndGetRequire(){
            if(!empty($_GET)){
                    foreach($_GET as $key=>$v){
                        $this->{"g_".$key}    = $this->inject_check($v);
                    }
            }
            if(!empty($_POST)){
                    foreach($_POST as $key=>$v){
                        if(!is_array($key)){
                                $this->{"p_".$key}    = $this->inject_check($v);  
                        }
                    }
            }
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
    
    //菜单显示
    public function menu(){
            $menu_connetct =M("admin_menu");
            $result = $menu_connetct->query("select * from ".PR."admin_menu  where switch='true' and display='true' and site=1 order by orderid asc,id asc ");
            $desktop ="";
            $footer_menu='<ul class="nav1">';
            $index_arr = array();
            foreach ($result as $key=>$v){
                        //权限
                        if($this->level(1,$v["m"],$v["c"],$v["a"])){
                                if($v["islink"]){
                                        $url = $this->a_url("",$v["m"],$v["c"],$v["a"],'','',1);
                                        $index_arr['index_'.$v["c"]] = $url;
                                }else{
                                        $url = "";
                                }
                                
                                //桌面菜单
                                if($v["islink"] !=0){
                                        $desktop  .= '<li><a title="'.$v["title_cn"].'" href="'.$url.'"><span class="menu-title">'.  $this->mb_str($v["title_cn"],7).'</span></a></li>';
                                }
                                //底部菜单
                                if($v["pid"] == 0){
                                            $footer_menu .=' <li><a href="'.$url.'">'.$this->mb_str($v["title_cn"],8).'</a>';
                                            $footer_menu .= $this->sub_menu($v["id"]);
                                            $footer_menu .='</li>';
                                }
                      }
            }
            $footer_menu .='</ul>';
            $this->assign($index_arr);
            $this->assign("desktop",$desktop);
            $this->assign("footer_menu",$footer_menu);
    }
    
    public function sub_menu($id=0){
            $result = $this->query("select * from ".PR."admin_menu  where switch='true' and display='true' and site=1 and pid=$id order by orderid asc ");
            if(!empty($result)){
                        $submenu = '<ul class="sub_nav hide">';
                        foreach ($result as $key=>$v){
                                    //权限
                                    if($this->level(1,$v["m"],$v["c"],$v["a"])){
                                                    if($v["islink"]){
                                                            $url = $this->a_url("",$v["m"],$v["c"],$v["a"],'','',1);
                                                            $index_arr['index_'.$v["c"]] = $url;
                                                    }else{
                                                            $url = "";
                                                    }
                                                    $submenu .='<li><a href="'.$url.'">'.$this->mb_str($v["title_cn"],8).'</a>';
                                                    if($this->GetOne("select * from ".PR."admin_menu  where switch='true' and display='true' and site=1 and pid=".$v["id"]." order by orderid asc ")){
                                                            $this->sub_menu($v["id"]);
                                                    }
                                                    $submenu .='</li>';

                                    }
                        }
                        $submenu .= '</ul>';
            }
            return $submenu;
    }
    
  
    //权限管理
    public function level($get=0,$m="",$c="",$a=""){
            $admin_goup_row = $this->GetOne("select limits from `".PR."admin_group` where id=".admingroup." ");
            if(empty($admin_goup_row)){
                    if(!BACKJSON){
                            exit("权限不足(503)！");
                    }else{
                            exit(json_encode(array("error"=>3,"error_txt"=>"账号权限不足！")));
                    }
                    
            }
       
            if(sys == "true") return 1;
            $limits =  explode(",", $admin_goup_row["limits"]);
            if($get==1){
                        $in ="";
                        if($m)
                                $in .=$m;
                        if($c)
                                $in .="_".$c;
                        if($a)
                                $in .="_".$a;
                        if(empty($in) || !in_array($in,$limits)){
                                return 0;
                        }else{
                                return 1; 
                        }
            }elseif($get==2){ //单一权限判断 如：edit，add 等。 
                        $quan_xian =MODULE_NAME."_".CONTROLLER_NAME."_"."$m";
                        if(!in_array($quan_xian,$limits)){
                                if(!BACKJSON){
                                        exit("权限不足！");
                                }else{
                                        exit(json_encode(array("error"=>3,"error_txt"=>"账号权限不足！")));
                                }
                        }
            }else{
                    //echo MODULE_NAME."_".CONTROLLER_NAME."_".ACTION_NAME;
                    if(ACTION_NAME == "addup"){
                            $id =I("id","");
                            if($id)
                                    $quan_xian =MODULE_NAME."_".CONTROLLER_NAME."_"."edit";   
                            else
                                    $quan_xian =MODULE_NAME."_".CONTROLLER_NAME."_"."add";
                    }elseif(strpos(ACTION_NAME,'addup')!== false){
                            if($id)
                                    $quan_xian =MODULE_NAME."_".CONTROLLER_NAME."_".ACTION_NAME."_edit";   
                            else
                                    $quan_xian =MODULE_NAME."_".CONTROLLER_NAME."_".ACTION_NAME."_add";
                    }else{
                                    $quan_xian =MODULE_NAME."_".CONTROLLER_NAME."_".ACTION_NAME;
                    }

                    if(!in_array($quan_xian,$limits)){
                                    if(!BACKJSON){
                                            $this->ShowMsgC("权限不足！");
                                    }else{
                                            exit(json_encode(array("error"=>3,"error_txt"=>"账号权限不足！")));
                                    }
                                    exit();
                    }
        }
    }
    //单个权限判断
    public function isPer($per=""){
            $admin_goup_row = $this->GetOne("select limits from `".PR."admin_group` where id=".admingroup." ");
            if(sys == "true") return 1;
            $limits =  explode(",", $admin_goup_row["limits"]);
            if(!empty($per) && in_array($per,$limits)){
                return 1;
            }
            return 0; 
    }
    
    
    //定义URL路径
    public function a_url($URLname = "",$m="Fadsopcms",$model="", $action = "index", $join = "",$no_getarr=array(),$is=0) {
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
    
        //获取配置
    public function getConfig($keyworld="",$is="dan_ge",$all=0){
        if($all){
            $result = $this->query("select * from `".PR."config` where ".sql_true." ");
        }else{
            if($is == "dan_ge"){
                $result2 = $this->GetOne("select varvalue from `".PR."config` where ".sql_true." and varname='$keyworld' ");
                $result =$result2["varvalue"]; 
            }else{
                $result = $this->GetOne("select * from `".PR."config` where ".sql_true." and varname='$keyworld' ");
            }
        }
        return $result;
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
               $input_  ='<input type="hidden" name="m" value="'.MODULE_NAME2.'">';
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
                if(BACKJSON){
                        exit(json_encode(array("error"=>505,"error_txt"=>"$msg")));
                }
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

    //消息显示(ajax提示)
    public function ShowMsg($msg = '', $gourl = '-1', $del = "") {
                if ($gourl == '-1') {
                    $msgs = 'alert("' . $msg . '");';
                } else if ($gourl == '0') {
                    $msgs = 'alert("' . $msg . '");location.reload();';
                } else {
                    if ($msg == "") {
                        $msgs = 'location.href="' . $gourl . '";';
                    } else {
                        if ($del) {
                            $msgs = 'alert("' . $msg . '");top.tab_del(\'' . $del . '\')';
                        } else {
                            $msgs = 'alert("' . $msg . '");location.href="' . $gourl . '";';
                        }
                    }
                }
                $json = array("msgText" => $msgs);
                echo json_encode($json);
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
    public function getMemberUserId(){
        return 0;
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
    //电子邮箱验证
    public function emai($emai=""){
      if(!$emai){
            return false; 
      }
      if(preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/', $emai)){
            return true;
      }else{
            return false;
      }  
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
                $str = str_replace("script","/", $str);    // 把 '%'过滤掉     
                $str = str_replace("'","`", $str);    // 把 '%'过滤掉     
                $str = str_replace("\"","`", $str);    // 把 '%'过滤掉     
                $str = str_replace("\\","/", $str);    // 把 '%'过滤掉     
                return $str;    // 进行过滤      
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

    
     //文件上传
    public function uplodes($file="", $wjName = "",$suolvtu=1,$suolvtu_width="120",$suolvtu_height="120",$lujin=""){
	$_FILES =$file;
        $uptypes = array('image/jpg', 'image/jpeg', 'image/png', 'image/pjpeg', 'image/gif', 'image/bmp', 'image/x-png');
        $max_file_size = 2000000;     //上传文件大小限制, 单位BYTE  
        $destination_folder = !empty($lujin)?$lujin."/".date("Y",time())."/".date("Ymd",time())."/":date("Y",time())."/".date("Ymd",time())."/"; //上传文件路径  
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
        $filename = $file["tmp_name"];
        $image_size = getimagesize($filename);
        $pinfo = pathinfo($file["name"]);
        $ftype = $pinfo['extension'];
        $filenamepath = $wjName."." . $ftype;
        $destination = $folder_path . $filenamepath;
        if (file_exists($destination)) {
            unlink($destination);
        }
        if (!move_uploaded_file($filename, $destination)) {
            $error = 1;
            $error_txt = "移动文件出错!".$destination;
            $return_arr[0] = $error;
            $return_arr[1] = $error_txt;
            return $return_arr;
        }
        if($suolvtu)
        $this->img_create_small($destination,$suolvtu_width,$suolvtu_height,$folder_path.$wjName."_thumb." . $ftype);
        
        
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
    
    
  //------省市区 开始--------------------------------
   public function ajax_Get($id=0,$level=0){
                $str = '<option value="0">--请选择--</option>';
                if($id>0 && $level>0){
                    if($level == 2){
                                  $rep = $this->query("select * from `".PR."area` where ".sql_true." and pid= $id  ");
                                  foreach($rep as $key=>$v){
                                      $str .='<option value="'.$v["id"].'">'.$v["name"].'</option>'; 
                                  }
                    }
                    if($level ==3){
                                  $rep = $this->query("select * from `".PR."area` where ".sql_true." and pid= $id ");
                                  foreach($rep as $key=>$v){
                                      $str .='<option value="'.$v["id"].'">'.$v["name"].'</option>'; 
                                  }
                    }

                    if($level ==4){
                                  $rep =  $this->query("select * from `".PR."admin` where  city = $id "); //还要加上管理员组
                                  foreach($rep as $key=>$v){
                                       $str .='<option value="'.md5($v["adsum"]).'">'.$v["adsum"].'</option>'; 
                                  }

                    }

                }
                return $str;
   }
   public function GetCityName($id=0){
                global $a; 
                $result =$this->GetOne("select pid,name from `".PR."area` where id= $id ");
                $pid   = $result['pid'];
                if(empty($a)){
                            $a = $result['name'];  
                }else{
                            $a .= ",".$result['name'];    
                }
                if($pid>0){
                            $this->GetCityName($pid); 
                }
                return $a;
    } 
    public function get_city($id=0){
                global $a; 
                $result =$this->GetOne("select id,pid from `".PR."area` where id= $id ");
                $pid   = $result['pid'];
                if(empty($a)){
                            $a = $result['id'];  
                }else{
                            $a .= ",".$result['id'];    
                }
                if($pid >0){
                            $this->get_city($pid); 
                }
                return $a;
    } 
    public function citylist($pid = 0, $level = 0, &$lists = array(), $zx = 0) {
                $result = $this->query("select id,pid,name,switch from `" . PR . "area` where " . sql_tf . " and pid= $pid order by addtime desc,orderid desc");
                foreach ($result as $key => $v) {
                    $pid2 = $v["id"];
                    $title = $v["name"];
                    $lists[$pid2] = $v;
                    $sx = "";
                    for ($i = 0; $i < $level; $i++) {
                        if (!$zx)
                            $sx .='|-';
                        else
                            $sx .='<span class="zxian"></span>';
                    }
                    $lists[$pid2]["name"] = $sx . $title;
                    $this->citylist($pid2, $level + 1, $lists, $zx);
                }
                return $lists;
    }
    public function ListCity($city1="",$city2="",$city3=""){
                    $city1Str =  $city2Str  =  $city3Str = "";
                    $city1_row = $this->query("select id,name from `".PR."area` where ".sql_true." and  pid=0 ");
                    foreach($city1_row as $key=>$v){
                            if(!empty($city1) && $city1 == $v["id"]){
                                    $check = ' selected="selected"';
                            }else{
                                    $check = "";
                            }
                            $city1Str .='<option '.$check.' value="'.$v["id"].'">'.$v["name"].'</option>'; 
                    }
                    if(!empty($city1) && !empty($city2)){
                            $city2_row = $this->query("select id,name from `".PR."area` where ".sql_true." and  pid=$city1 ");
                            foreach($city2_row as $key=>$v){
                                    if(!empty($city2) && $city2 == $v["id"]){
                                            $check = ' selected="selected"';
                                    }else{
                                            $check = "";
                                    }
                                    $city2Str .='<option '.$check.' value="'.$v["id"].'">'.$v["name"].'</option>'; 
                            }
                    }
                    if(!empty($city1) && !empty($city2) && !empty($city3)){
                            $city3_row = $this->query("select id,name from `".PR."area` where ".sql_true." and  pid=$city2 ");
                            foreach($city3_row as $key=>$v){
                                    if(!empty($city3) && $city3 == $v["id"]){
                                            $check = ' selected="selected"';
                                    }else{
                                            $check = "";
                                    }
                                    $city3Str .='<option '.$check.' value="'.$v["id"].'">'.$v["name"].'</option>'; 
                            }
                    }
                    return array($city1Str,$city2Str,$city3Str);
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
    
        
    public function column2($pid = 0, $level = 0, &$lists = array(), $zx = 0,$sql='') {
        $result = $this->query("select * from `".PR."column` where " . sql_tf . " and pid= $pid $sql order by orderid desc");
        foreach ($result as $key => $v) {
            $pid2 = $v["id"];
            $title = $v["title"];
            $lists[$pid2] = $v;
            $sx = "";
            for ($i = 0; $i < $level; $i++) {
                if (!$zx)
                    $sx .='|--';
                else
                    $sx .='<span class="zxian2"></span>';
            }
            $lists[$pid2]["title"] = $sx.$title;
            $this->column2($pid2, $level + 1, $lists, $zx ,$sql);
        }
        return $lists;
    }
    
    
}





