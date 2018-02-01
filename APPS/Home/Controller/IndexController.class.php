<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController{
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        //幻灯一
        $slide = $this->query("select * from `".PR."ad` where ".sql_true." and siteid=".site." and colunmid=1 and type=1 order by orderid asc ");
        foreach ($slide as $key=>$v){
            $hide = 'hide';
            $mo   = "";
            if(empty($slideStr)){
                $hide="";
                $mo   = "mo";
            }
                
            $slideStr .='<img class="'.$hide.'" src="'.tupain.$v["pic"].'" />';
            $listSlidSpan .='<span class="span-box '.$mo.' "></span>';
        }
        $this->assign(array('slideStr'=>$slideStr,'listSlidSpan'=>$listSlidSpan));
        
        
        
        
        
        //广告
        $adRow = $this->query("select * from `".PR."ad` where ".sql_true." and siteid=".site." and colunmid=1 and type=2 order by orderid asc limit 0,1");
        foreach($adRow as $key=>$v){
            $arr["adC".($key+1)] ='<a href="'.$v["url"].'"><img src="'.tupain.$v["pic"].'"/></a>';
        }
        $this->assign(array("arr"=>$arr));
        
        
        
        
        //关于积成航科
        $ASROW      = $this->GetOne("select description from `".PR."column` where ".sql_true." and id=2 ");
        $this->assign(array("descInfo"=>$ASROW["description"],"asHref"=>  $this->a_url("","Home","CluCentre","index","&cluinid=2",array("infid"))));
        
        
        
         //公司动态 幻灯
        $dongtai = $this->query("select * from `".PR."ad` where ".sql_true." and siteid=".site." and colunmid=11 and type=2 order by orderid asc");
        foreach ($dongtai as $key=>$v){
            $hide = 'hide';
            $mo   = "";
            if(empty($dongtaiStr)){
                $hide="";
                $mo   = "mo";
            }
            $dongtaiStr .='<a class="'.$hide.'" href="'.$v["url"].'"><img  src="'.tupain.$v["pic"].'" /></a>';
        }
        $this->assign(array("dongtaiStr"=>$dongtaiStr));
        
        //公司动态
        $_Title01 ="";
        $_Des01   ="";
        $_list01  ="";
        $ZXDT       = $this->query("select id,title,column_id,description,addtime from `".PR."column_list` where ".sql_true." and column_id=11 and is_status=1 limit 0,4 ");
        foreach($ZXDT as $key=>$v){
            if($key==0){
                $_Title01 = $this->mb_str($v["title"], 38);
                $_Des01   = $this->mb_str($v["description"], 88);
                $_url01   = $this->a_url("","Home","CluCentre","contentInfo","&mo=4&cluinid=4",array("infid","mo"))."&infid=".md5($v["column_id"])."&listinfo=".md5($v["id"]);
                $_url01more   = $this->a_url("","Home","CluCentre","index","&mo=4&cluinid=4",array("infid","mo"))."&infid=".md5($v["column_id"]);
            }else{
                  $_list01 .='<a href="'.$this->a_url("","Home","CluCentre","contentInfo","&mo=4&cluinid=4",array("infid"))."&infid=".md5($v["column_id"])."&listinfo=".md5($v["id"]).'"><li>'.$v["title"].' <span>'.date("Y-m-d",$v["addtime"]).'</span></li></a>'; 
            }
        }
        $this->assign(array('_Title01'=>$_Title01,'_Des01'=>$_Des01,'_list01'=>$_list01,'_url01'=>$_url01,'_url01more'=>$_url01more));
        
        
        
        //行业动态 幻灯
        $hangye = $this->query("select * from `".PR."ad` where ".sql_true." and siteid=".site." and colunmid=12 and type=2 order by orderid asc");
        foreach ($hangye as $key=>$v){
            $hide = 'hide';
            $mo   = "";
            if(empty($hangyeStr)){
                $hide="";
                $mo   = "mo";
            }
            $hangyeStr .='<a class="'.$hide.'" href="'.$v["url"].'"><img src="'.tupain.$v["pic"].'" /></a>';
        }
        $this->assign(array("hangyeStr"=>$hangyeStr));
        
        
        
        //行业动态
        $_Title02 ="";
        $_Des02   ="";
        $_list02  ="";
        $ZXDT       = $this->query("select id,column_id,title,description,addtime from `".PR."column_list` where ".sql_true." and column_id=12 and is_status=1 limit 0,4 ");
        foreach($ZXDT as $key=>$v){
            if($key==0){
                $_Title02 = $this->mb_str($v["title"], 38);
                $_Des02   = $this->mb_str($v["description"], 88);
                $_url02   = $this->a_url("","Home","CluCentre","contentInfo","&mo=4&cluinid=4",array("infid","mo"))."&infid=".md5($v["column_id"])."&listinfo=".md5($v["id"]);
                $_url02more   = $this->a_url("","Home","CluCentre","index","&mo=4&cluinid=4",array("infid","mo"))."&infid=".md5($v["column_id"]);
            }else{
                  $_list02 .='<a href="'.$this->a_url("","Home","CluCentre","contentInfo","&mo=4&cluinid=4",array("infid"))."&infid=".md5($v["column_id"])."&listinfo=".md5($v["id"]).'"><li>'.$v["title"].' <span>'.date("Y-m-d",$v["addtime"]).'</span></li></a>'; 
            }
        }
        $this->assign(array('_Title02'=>$_Title02,'_Des02'=>$_Des02,'_list02'=>$_list02,'_url02'=>$_url02,'_url02more'=>$_url02more));
        
        
        
        
        //产品展示
        $ProductRow  = $this->query("select id,title,type,pic,addtime from `".PR."product` where ".sql_true." order by orderid asc,id desc  limit 0,12 ");
        $ProStr ="";
        foreach($ProductRow as $key=>$v){
                $ProStr .='<div class="list-l">
                            <a href="'.$this->a_url("","Home","CluCentre","productInfo","&mo=5&cluinid=5&protypeid=".$v["type"]."",array("proid,mo"))."&proid=".md5($v["id"]).'">
                                <div class="img"><img src="'.tupain.$v["pic"].'"/></div>
                                <div class="title">'.$this->mb_str($v["title"],30).'</div>
                             </a>
                          </div>';
        }
        
        $this->assign(array('ProStr'=>$ProStr,'ProMore'=>$this->a_url("","Home","CluCentre","productInfo","&cluinid=5",array("proid,mo"))));
        
        
        
        $this->veiws("Index","index");
    }
}