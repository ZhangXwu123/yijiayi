<?php
/*
 * 系统首页
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class IndexController extends CommonController{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
            $title ="系统首页";
            
            $TiXing     = 0;
            $stock      = "";
            $order      = "";
            $fa_huo     = "";
            //库存不足的商品
            $stock_n = $this->GetOne("select COUNT(id) as num from `".PR3."goods` where ".sql_true." and is_shangjia=1 and stocknumber=0 ");
            if(!empty($stock_n) && $stock_n["num"] >0 ){
                    $TiXing = 1;
                    $stock  = '<a href="'.$this->a_url("","YiJiaYicms","Goods","index",'&stock=ok','',1).'"><b style="width: 100%; margin:10px 10px; display: block;" class="red">有 '.$stock_n["num"].' 件商品库存量不足，请及时补充货物！</b></a>';
            }
            //今日订单数 
            $begintime = strtotime(date("Y-m-d H:i:s",mktime(0,0,0,date("m"),date("d"),date("Y"))));
            $endtime = strtotime(date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("d"),date("Y"))));
            
            
            $order_n = $this->GetOne("select COUNT(id) as num from `".PR3."goods_order_master` where ".sql_true." and ispay='pay' and (is_status!='wait_pay' or is_status!='close' or is_status!='tuikuan_ok' or is_status!='tuihuo_ok') and addtime>= $begintime and addtime <= $endtime");
            if(!empty($order_n) && $order_n["num"] >0 ){
                    $TiXing = 1;
                    $order  = '<a href=""><a href=""><b style="width: 100%; margin:10px 10px; display: block;" class="red">今日订单数为：'.$order_n["num"].' 笔！</b></a>';
            }
            //发货提醒
            $fa_huo_n = $this->GetOne("select COUNT(id) as num from `".PR3."goods_order_master` where ".sql_true." and ispay='pay' and is_status ='wait_fahuo' ");
            if(!empty($fa_huo_n) && $fa_huo_n["num"] >0 ){
                    $TiXing = 1;
                    $fa_huo  = '<a href=""> <a href=""><b style="width: 100%; margin:10px 10px; display: block;" class="red">有 '.$fa_huo_n["num"].' 笔订单等待发货，请及时处理！</b></a>';
            }
            if(adminlevel >9){
               $TiXing =0;
            }
            
            $this->assign(array("ctitle"=>$title,'TiXing'=>$TiXing,'stock'=>$stock,'order'=>$order,'fa_huo'=>$fa_huo));
            $this->veiws("Index","index");
    }
    public function EditPassword(){
            $action = I("action","");
            
            if($action == "EditP"){
                        if(empty($this->p_oldpassword)){
                                $this->ShowMsgC("请输入原始密码！");
                        }
                        if(empty($this->p_password)){
                                $this->ShowMsgC("请输入新密码！");
                        }
                        if(empty($this->p_confirpassword)){
                                $this->ShowMsgC("请输入确认密码！");
                        }
                        if($this->p_password != $this->p_confirpassword){
                                $this->ShowMsgC("确认密码输入错误，请核对后提交修改！");
                        }
                        $addmin_row = $this->GetOne("select * from `".PR."admin` where id=".adminid." ");
                        if(empty($addmin_row)){
                                $this->ShowMsgC("账号已过期，请重新登录！");
                        }
                        $admin_password = $addmin_row["password"];
                        $admin_salts    = $addmin_row["salts"];
                        $salts          = $this->getRandChar(4);

                        if($admin_password != sha1(sha1($this->p_oldpassword).$admin_salts)){
                                    $this->ShowMsgC("原始密码错误，请重新输入！");
                        }
                        $result = $this->query("update `".PR."admin` set password='".sha1(sha1($this->p_password).$salts)."',salts='$salts',uptime='".thistime."' where id=".$addmin_row["id"]." ");
                        if(!(string)$result){
                                $this->ShowMsgC("操作失败！");
                        }else{
                                if(!BACKJSON){
                                        $this->ShowMsgC("操作成功！",$this->a_url("","YiJiaYicms","Index","EditPassword"));
                                }else{
                                        exit(json_encode(array("error"=>0,"success"=>"操作成功！")));
                                }
                        }
                        exit();
            }
            $title ="修改密码";
            $this->assign(array("ctitle"=>$title,'action'=>"EditP"));
            $this->veiws("Index","EditPassword");
    }
    
    public function EditCode(){
            $keyworld   =I("keyworld",'');
            $bian       =I("bian",'');
            if($this->p_action == "Edit"){
                $file_code = I("file_code","");
                if(!empty($this->p_file_code) && !empty($this->p_path)){
                    $this->config_file($this->p_path,$file_code);
                }
                $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Index","EditCode"));
            }
            if(empty($bian))
                $spanfile = $this->getFile($keyworld);
            else
                $spanfile = "";
            if(empty($spanfile)){
                    $spanfile = '<span style=" display: block;width: 100%; padding: 5px 0px; margin: 2px; "> 没有查找到相关记录，可以进行添加文件操作。</span>';
            }
            if($bian == "yes"){
                    $file_code = str_replace("<?php", "", $this->getContent($keyworld));
                    $file_code = str_replace("?>", "",$file_code);
                    
             }
            $title ="修改密码";
            $this->assign(array("ctitle"=>$title,'action'=>"Edit",'keyworld'=>$keyworld,'spanfile'=>$spanfile,'file_code'=>$file_code));
            $this->veiws("Index","EditCode");   
    }
    
    
     public function config_file($path="",$File=""){
            if (!file_exists($path)) {
                mkdir($folder_path,7777,TRUE);
            }
            if($File){
                 $File ="<?php $File ?>";
                 file_put_contents ($path,$File);
            }
              
    }
    
    public function getContent($path=""){
        if(empty($path)){
            return ;
        }else{
            $handle = opendir($path);
            while(($fname = readdir($handle)) !== false){
                        if($fname != '.' && $fname != '..')
			{
                                if(is_dir("$path")){
                                    return ;
                                }else{
                                    return file_get_contents("$path");
                                    break;
                                }
			}
            }
        }
        return ;
    }
    
    public function getFile($path=""){
            if(empty($path)) 
                $path = rtrim(BASE_PATH, "/");
            
            $span_file ="";
            $handle = opendir($path);
            $edit_url = $this->a_url("","YiJiaYicms","Index","EditCode","",array("keyworld",'bian'));
            while(($fname = readdir($handle)) !== false)
            {
			if($fname != '.' && $fname != '..')
			{
                                if(is_dir("{$path}/{$fname}")){
                                    $span_file .='<span style=" display: block;width: 100%; padding: 5px 0px; margin: 2px; ">'.$path."/".$fname.'</span>';
                                }else{
                                    $span_file .='<span style=" display: block;width: 100%; padding: 5px 0px; margin: 2px; ">'."{$path}/{$fname}".'<a href="'.$edit_url.'&keyworld='."{$path}/{$fname}".'&bian=yes">  &nbsp;&nbsp;&nbsp;修改</a></span>';
                                }
			}
            }
            closedir($handle);
            return $span_file;
    }
    
    
}
