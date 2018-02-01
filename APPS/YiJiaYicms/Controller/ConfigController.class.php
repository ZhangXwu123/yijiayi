<?php

/* 基本设置
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace YiJiaYicms\Controller;

use Think\Controller;

class ConfigController extends CommonController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
                $action = I("action", "");
                $upload = I("upload", "");
                if ($action == "addup") {
                            $this->addup();
                }
                if ($upload == 1 && !empty($_FILES)) { //上传
                            $result = $this->uplodes($_FILES, "logo",0, 220, 80, 'JCHK/logo');
                            if ($result[0] > 0) {
                                    exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                            }
                            exit(json_encode(array("error" => 0, "picurl" => $result[2])));
                }

                $config_arr = array();
                $config_row = $this->query("select varname,varvalue from `" . PR . "config` where " . sql_true . " order by orderid asc ");
                foreach ($config_row as $key => $v) {
                            $config_arr[$v["varname"]] = $v["varvalue"];
                }
                $this->assign($config_arr);
                $title ="基本设置";
                $this->assign(array("ctitle"=>$title,'action'=>"addup"));
                $this->veiws("Config", "index");
    }

    public function addup() {
                $arr = array("web_title", "web_address", 'web_logo', 'web_keyworld', 'web_description', 'web_tel', 'web_footinfo', 'web_link', 'web_img_url','web_beian');
                $insert_sql     = "";
                $config_file    = "<?php \n";
                foreach ($_POST as $key => $v) {
                            if (in_array($key, $arr)) {
                                        $result = $this->query("select id from `" . PR . "config` where varname='$key'");
                                        $result = $result[0];
                                        $v = $this->inject_check($v);
                                        if (empty($result)) {
                                                    if (empty($insert_sql)) {
                                                        $douhao = "";
                                                    } else {
                                                        $douhao = ",";
                                                    }
                                                    $insert_sql .= $douhao . "(1,'$key','$v','true')";
                                        } else {
                                                    $this->query("update  `" . PR . "config` set siteid='1',varvalue='$v' where varname='$key'");
                                        }
                                        $config_file .= 'define("cfg_'.$key.'","'.$v.'");  ';
                            }
                }
                $config_file .="\n ?>";
                if ($insert_sql) {
                    $this->query("insert into `" . PR . "config`(siteid,varname,varvalue,switch) values $insert_sql");
                }
                $this->config_file($config_file);
                $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Config", "index"));
                exit();
    }
    
    public function config_file($File=""){
            $path = BASE_PATH."config.php";
            if (!file_exists($path)) {
                mkdir($folder_path,0700,TRUE);
            }
            if($File)
               file_put_contents ($path,$File);
    }
    

}
