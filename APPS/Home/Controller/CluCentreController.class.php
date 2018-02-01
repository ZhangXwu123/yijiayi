<?php
namespace Home\Controller;
use Think\Controller;
class CluCentreController extends CommonController{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
            $cluinid    = I("cluinid","");
            $result02 = $this->init();
            if($result02["attr"] ==1){
                $this->info(md5($result02["infid"]),$cluinid);
            }elseif($result02["attr"] ==2){
                $this->infolist($result02["infid"],$result02["rtitle"]);
            }
            $this->veiws("CluCentre","index");
    }
    
    public function init(){
        $cluinid    = I("cluinid","");
        $result =$this->GetOne("select title from `".PR."column` where ".sql_true." and siteid=".site."  and id=$cluinid ");
        $DQWZ ='当前位置：<a href="'.$this->a_url("","Home","CluCentre","index","",array("infid")).'">'.$result["title"].'</a>';
        $result02 = $this->leftMenu($DQWZ,$cluinid);
        $this->assign(array("mtitle"=>$result["title"]));
        return $result02;
    }
    
    
    public function leftMenu($DQWZ,$cluinid){
        $nav_str = "";
        $i  =1;
        $infid=I("infid","");
        $attr ="";
        $href = $this->a_url("","Home","CluCentre","index","",array("infid"));
        
        $navArr = $this->query("select * from `".PR."column` where ".sql_true." and siteid=".site."  and pid=$cluinid  order by orderid asc ");
        foreach ($navArr as $key=>$v){
            if(empty($infid) && $key==0){ 
                $stick="class='mo'"; 
            }elseif($infid == md5($v["id"])){
                $stick="class='mo'"; 
            }else{
                $stick="";
            } 
            if($stick){
                $DQWZ .='><a href="'.$href."&infid=".md5($v["id"]).'">'.$v["title"].'</a>';
                $attr =$v["attr"];
                $infid =$v["id"];
                $rtitle =$v["title"];
            }
            if(!empty($v["url"])) 
                $href = $v["url"]."&infid=".md5($v["id"]); 
            else
                $href =$href."&infid=".md5($v["id"]);
            $nav_str .= '<div class="list-m"><a '.$stick.' href="'.$href.'">'.$v["title"].'</a></div>';
        }
        $this->assign("DQWZ",$DQWZ);
        $this->assign("asnav",$nav_str);
        return array("attr"=>$attr,'infid'=>$infid,'rtitle'=>$rtitle);
    }
    
    public function info($infid=0,$cluinid=0){
            $infid=I("infid",$infid);
            $return = $this->GetOne("select * from `".PR."column` where ".sql_true." and siteid=".site."  and pid=$cluinid and md5(md5(id))='".md5($infid)."'  order by orderid asc ");
            $infostr =' <h1>'.$return["title"].'</h1>
                        <div class="content">
                            '.htmlspecialchars_decode($return["content"]).'
                        </div>';
           $this->assign("infostr",$infostr);
    }
    
    public function infolist($infid=0,$rtitle=0){
            $infostr    =' <h1>'.$rtitle.'</h1><div class="content"><ul class="ul-list-info">';
             if(LoginS){
                $sql =" and ismb='1'";
            }else{
                $sql =" and ismb='0'";
            }
            
            $return02 = $this->GetPage("select id,title,addtime,hits from `".PR."column_list` where ".sql_true." $sql and siteid=".site." and column_id=$infid and is_status=1  order by orderid asc,addtime desc ");
            
            $href = $this->a_url("","Home","CluCentre","contentInfo","",array("listinfo"));
            foreach($return02 as $key=>$v){
                    $infostr .= '<li><a href="'.$href."&listinfo=".md5($v["id"]).'">'.$this->mb_str($v["title"],80).'<span class="riqi">日期：'.date("Y-m-d",$v["addtime"]).'</span><span class="liulan">浏览：'.$v["hits"].'</span></a></li>';   
            }   
            $infostr    .=' </ul>
                        <div class="cl"></div>
                     </div>';
           $this->assign("infostr",$infostr);
    }
    
    public function contentInfo(){
            $resultini = $this->init();
            $infid=I("listinfo","");
            if(LoginS){
                $sql =" and ismb='1'";
            }else{
                $sql =" and ismb='0'";
            }
            
            $return = $this->GetOne("select * from `".PR."column_list` where ".sql_true." and siteid=".site." $sql and is_status=1 and md5(md5(id))='".md5($infid)."'  order by orderid asc ");
            $infostr =' <div class="content">
                            <div class="info-l">
                                <div class="top">
                                    <h2>'.$return["title"].'</h2>';
            
             if(LoginS)
                 $infostr .=' <span><a>来源：'.$return["source"].'</a><a>浏览：'.($return["hits"]+1).'</a><a>日期：'.date("Y-m-d",$return["addtime"]).'</a></span>';
             else
                 $infostr .=' <span><a>来源：'.$return["source"].'</a><a>日期：'.date("Y-m-d",$return["addtime"]).'</a></span>';
             
            $infostr .=           ' </div>
                                <div class="content-l">
                                    '.$return["content"].'
                                </div>
                            </div>
                         </div>';
            if(LoginS)
                $this->query("update `".PR."column_list` set hits='".($return["hits"]+1)."' where id=".$return["id"]." ");
            $this->assign("infostr",$infostr);
            $this->veiws("CluCentre","contentInfo");
    }
    
    public function product(){
            $resultini = $this->init();
            $protypeid     = I("protypeid",'1');
            $href = $this->a_url("","Home","CluCentre","productInfo","",array("proid"));
            $infostr    ='<h1>'.$resultini["rtitle"].'</h1><div class="content"><div class="prd-list">';
            $result =  $this->GetPage("select id,pic,title from `".PR."product` where ".sql_true." and md5(type)='".md5($protypeid)."' order by orderid desc,id desc ");
            foreach($result as $key=>$v){
                   $infostr .='<a href="'.$href."&proid=".md5($v["id"]).'"><div class="list-l">
                                    <div class="img"><img src="'.tupain.$v["pic"].'"/></div>
                                    <div class="title">'.$this->mb_str($v["title"],30).'</div>
                                </div></a>'; 
            }
            $infostr .=' <div class="cl"></div></div></div>'; 
            $this->assign("infostr",$infostr);
            $this->veiws("CluCentre","product");
    }
    public function productInfo(){
            $resultini  = $this->init();
            $proid      = I("proid","");
            $return = $this->GetOne("select title,content from `".PR."product` where ".sql_true."  and md5(md5(id))='".md5($proid)."'  ");
             $infostr ='<h1>'.$return["title"].'</h1>
                        <div class="content">
                            '.$return["content"].'
                        </div>';
            $this->assign("infostr",$infostr);
            $this->veiws("CluCentre","productInfo");
    }
    public function zhaopin(){
            $resultini = $this->init();
            $href = $this->a_url("","Home","CluCentre","zhaopinInfo","",array("zhaopinid"));
            $infostr    ='<h1>'.$resultini["rtitle"].'</h1>
                          <div class="content">
                            <table class="table" border="0" cellpadding="0" cellspacing="0">
                                <tr class="head">
                                    <td>职位名称</td>
                                    <td>职位类别</td>
                                    <td>发布时间</td>
                                    <td>操作</td>
                                </tr>';
            $result =  $this->query("select * from `".PR."zhaopin` where ".sql_true."  order by orderid desc,fbtime desc ");
            foreach($result as $key=>$v){
                   $infostr .=' <tr>
                                    <td>'.$v["title"].'</td>
                                    <td>'.$v["type"].'</td>
                                    <td>'.date("Y-m-d",$v["fbtime"]).'</td>
                                    <td><a class="btt" href="'.$href."&zhaopinid=".md5($v["id"]).'">查看详情</a></td>
                                </tr>'; 
            }
            $infostr .='  </table></div>'; 
            $this->assign("infostr",$infostr);
            $this->veiws("CluCentre","product");
    }
    public function zhaopinInfo(){
            $resultini      = $this->init();
            $zhaopinid      = I("zhaopinid","");
            $return = $this->GetOne("select * from `".PR."zhaopin` where ".sql_true."  and md5(md5(id))='".md5($zhaopinid)."'  ");
            $infostr ='<h1>'.$resultini["rtitle"].'</h1>
                        <div class="content">
                            '.htmlspecialchars_decode($return["content"]).'
                        </div>';
            $this->assign("infostr",$infostr);
            $this->veiws("CluCentre","zhaopinInfo");
    }
    
    
}