<?php
namespace Home\Controller;
use Think\Controller;
class MemberController extends CommonController{
    public function __construct() {
        parent::__construct();
    }

    public function login(){
           $username = trim(I("LoginUsername",""));
           $password = trim(I("LoginPassword",""));
           
           $error =0;
           $error_txt="";
           if(!$username){
               exit(json_encode(array("error"=>102,"error_txt"=>"请输入账户名！")));
           }
           if(!$password){
               exit(json_encode(array("error"=>103,"error_txt"=>"请输账户密码！")));
           }
           $username = md5($username);
           $member_row = $this->GetOne("select * from `".PR."member` where  ".sql_true." and (md5(mobile)='$username' or md5(username)='$username' ) ");    
           if(empty($member_row)){
                exit(json_encode(array("error"=>105,"error_txt"=>"账号或密码错误！")));  
           }
           $member_password = $member_row["password"];
           if(md5(md5($password)) !=$member_password){
               exit(json_encode(array("error"=>106,"error_txt"=>"账号或密码错误！")));  
           }
           session('mid',$member_row["id"]); 
           session('MBusername',$member_row["username"]);
           $ip = $this->GetIP();
           $this->query("update `".PR."member` set logintime='".thistime."',loginip='".$ip."' where id= ".$member_row["id"]." ");
           exit(json_encode(array("error"=>0))); 
    }
    public function loginout(){
            unset($_SESSION["mid"]);
            unset($_SESSION["MBusername"]);
            $this->ShowMsgC("已成功退出登录！",$this->a_url("","Home","Index","Index"));
    }
    public function reg(){
            $username       = I("username","");
            $mobile         = I("mobile","");
            $password       = I("password","");
            $repassword     = I("repassword","");
            $sex            = I("sex","");
            if(empty($username)){
                 exit(json_encode(array("error"=>604,"error_txt"=>"请输入用户名！"))); 
            }    
            if($this->GetOne("select id from `".PR."member` where ".sql_true." and  md5(username)='".md5($username)."'")){
                    exit(json_encode(array("error"=>605,"error_txt"=>"您输入用户名已被注册，请重新输入！"))); 
            }
            if(!$password){
                exit(json_encode(array("error"=>508,"error_txt"=>"请设置密码！"))); 
            }
            if(strlen($password)<6 || strlen($password)>20){
                exit(json_encode(array("error"=>509,"error_txt"=>"密码的长度为6-20字符！"))); 
            }
            if($password != $repassword){
                exit(json_encode(array("error"=>601,"error_txt"=>"确认密码错误，请重新输入！")));  
            }
            if(!$mobile){
                exit(json_encode(array("error"=>503,"error_txt"=>"请输入手机号！"))); 
            }
            if(!$this->mobile($mobile)){
                    exit(json_encode(array("error"=>504,"error_txt"=>"输入的手机号码有误！"))); 
            }
            if($result=  $this->GetOne("select id from `".PR."member` where  ".sql_true." and md5(mobile)='".md5($mobile)."'")){
                exit(json_encode(array("error"=>602,"error_txt"=>"手机号已注册！")));   
            }

            $password =md5(md5($password));
            $regtime = thistime;
            $regip = $this->GetIP();
            $switch = "true";
            $addtime = thistime;
            $result = $this->query("insert into `".PR."member`(username,password,sex,mobile,regtime,regip,switch,addtime) values('$username','$password','$sex','$mobile',$regtime,'$regip','$switch','$addtime')");
            if(!(string)$result){
                exit(json_encode(array("error"=>603,"error_txt"=>"操作错误(203)！"))); 
            }else{
                exit(json_encode(array("error"=>666)));
            }  
    }
}