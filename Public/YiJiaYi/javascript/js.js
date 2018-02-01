$(function(){
    var windheight = $(window).height();
    $(".index-main").css({"height":(windheight-12-60)});
    $(".login-page").css({"height":(windheight)});
    menu_ul();
    
    var ghprice = parseFloat($("#ghprice").attr("num"));
    $("#lirunbili").blur(function(){
        var vl =$(this).val();
        if(vl<0){
            alert("利润比例需大于零");
            return;
        }
        $("#price").val((ghprice+(ghprice*(vl/100))));
    });
    $("#price").blur(function(){
        var vl =$(this).val();
        if((((vl-ghprice)/ghprice)*100)<0){
            alert("利润比例需大于零");
            return;
        }
        $("#lirunbili").val(((vl-ghprice)/ghprice)*100);
    });
    
    click_gongneng();
    laydate_time("begintime");
    laydate_time("endtime");
});

function laydate_time(id){
        var laydate_obj = {
                elem: '#'+id,
                format: 'YYYY-MM-DD  hh:mm:ss',
                //min: laydate.now(), //设定最小日期为当前日期
               // max: '2099-06-16 23:59:59', //最大日期
                istime: true,
                istoday: true,
                choose: function(datas){
                     end.min = datas; //开始日选好后，重置结束日的最小日期
                     end.start = datas //将结束日的初始值设定为开始日
                }
        };
        laydate(laydate_obj);
}
function menu_ul(){
       var theight   = ($(window).height())-210;
       var zong_li_h = 0;
       var k=1;
       var li="";
       var urlstr_array =new Array();
       $(".index-menu li").each(function(index){
            zong_li_h += $(this).height();
            //alert(theight);
            theight     = parseInt(theight/45)*45;
            if((zong_li_h)>(theight*k)){
                    if(zong_li_h  >(theight*(k+1))){
                        k++; 
                    }
                    li = "<li>"+$(this).html()+"</li>";
                    if($.trim(urlstr_array[k-1])){
                        urlstr_array[k-1] += li;
                    }else{
                        urlstr_array[k-1]   = li;
                    }
                    $(this).remove();
            }
       });
       var count = urlstr_array.length;
       var ulstr="";
       for(i=0;i<count; i++){
          ulstr += "<ul class='index-menu'>"+urlstr_array[i]+"</ul>";
       }
       $(".index-main").find("div.cl").remove();
       $(".index-main").append(ulstr);
       $(".index-main").append('<div class="cl"></div>');
}
//点击功能按钮
function click_gongneng(OB){
    if(!$.trim(OB)){
            $(".menu-gongneng ul li").mouseover(function () {
                    $(this).find(".sub_nav").eq(0).removeClass("hide");
                    var len = $(this).find(".sub_nav:eq(0)>li").length;
                    var len2 = $(this).nextAll().length;
                    if((len*36-1) > len2*36){
                        $(this).find(".sub_nav").eq(0).css({"top":"-"+((len)*36-1)+"px"})
                    }else{
                        $(this).find(".sub_nav").eq(0).css({"top":"-35px"})
                    }
            });
            
            $(".menu-gongneng ul li").mouseleave(function () {
                $(this).find(".sub_nav").removeClass("hide");
                $(this).find(".sub_nav").addClass("hide");
            });
            
            $(".menu-gongneng").mouseleave(function(){
                $(".menu-gongneng").removeClass("hide");
                $(".menu-gongneng").addClass("hide");
            });
            
            
            
    }else{
            $(".menu-gongneng").removeClass("hide");
    }
}


function JC(){
    var h1 = $(".Trb_right").height();
    var h2 = $(window).height();
    var h3 = $(".msgbox-content").height();
    var w1 = $(window).width();
    var w2 = $(".msgbox-content").width();
    if( h1 > h2){
        $(".msgbox-bg").height((h1+200));
    }else{
        $(".msgbox-bg").height((h2+200));
    }
    $(".msgbox-content").css({"top":(h2-h3)/2,"left":(w1-w2)/2});
}
function NO01(){
    $(".msgbox-content").remove();
    $(".msgbox-bg").remove();
}
sub_go = 0;
function MSGBOX(method,url,obj,alertmsg){
    if(sub_go != 0 || ($.trim(alertmsg) && !confirm(alertmsg))){
         return ;
    }
    msg    =   '<div class="msgbox-bg"></div><div class="msgbox-content">';
    if(method == "post"){
             $.ajax({
                        url: url,
                        type: 'post',
                        data:obj.serialize(),
                        dataType: 'json',
                        beforeSend: function(){	//开始上传 
                            //$(".error").html('正在处理中，请稍后......');
                            sub_go = 1;
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("错误信息: 系统超时，请求错误！");
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';	//获得进度
                            //$(".error").html(percentVal);	//显示上传进度百分比
                        },
                        success: function(data) {
                                if(data.content){
                                    msg    +=   ' <div class="content01">'+data.content+'</div>';  
                                }
                                if(data.btt){
                                    msg    +=   ' <div class="butt01">'+data.btt+'<div class="cl"></div></div>'; 
                                }else{
                                    msg    +=   ' <div class="butt01"><span class="btt-msg1" onclick="NO01();">确定</span><span class="btt-msg1" onclick="NO01();">取消</span><div class="cl"></div></div>'; 
                                }
                                msg    +=   '</div>';
                            $("body").append(msg);
                            JC();
                        },
                        complete: function() {
                            sub_go = 0;
                        }
          });   
    }else{
            $.ajax({
                       url: url,
                       type: 'get',
                       dataType: 'json',
                       beforeSend: function(){	//开始上传 
                           sub_go = 1;
                       },
                       error: function(XMLHttpRequest, textStatus, errorThrown) {
                          alert("错误信息: 系统超时，请求错误！");
                       },
                       uploadProgress: function(event, position, total, percentComplete) {
                           var percentVal = percentComplete + '%';	//获得进度
                       },
                       success: function(data) {
                                if(data.content){
                                    msg    +=   ' <div class="content01">'+data.content+'</div>';  
                                }
                                if(data.btt){
                                    msg    +=   ' <div class="butt01">'+data.btt+'<div class="cl"></div></div>'; 
                                }else{
                                    msg    +=   ' <div class="butt01"><span class="btt-msg1" onclick="NO01();">确定</span><span class="btt-msg1" onclick="NO01();">取消</span><div class="cl"></div></div>'; 
                                }
                                msg    +=   '</div>';
                            $("body").append(msg);
                            JC();
                       },
                       complete: function() {
                           sub_go = 0;
                       }
            });
    }
  
}

//表单提交
sub_go=0;
function OnSubmint(){
    $("#Form").submit();
}
/*表单重置*/
function Reset(){
    $("#Form").reset();
}
function sub_get(msg,url){
  if(confirm(msg)){
   location.href=""+url;
  }
}
function sub_post(obj,msg){
  if(confirm(msg)){
   obj.parents("form").submit();
  }
}
function onSh(val){
   $(".product").each(function(e){
       var class_str =$(this).attr("class");
       if(class_str.indexOf("hide") <0 ){
          $(this).addClass("hide"); 
       }
   }); 
   $("#li_"+val).removeClass("hide");
}

$(function(){
   $(".prd").val("0"); 
   
   $(".lx").attr("checked",false)
   $(".lx").on("click",function(){
       onSh();
       $(".tz_"+$(this).val()).removeClass("hide");
       if($(this).val() ==1){
         $(".tz_2").addClass("hide");   
       }else{
         $(".tz_1").addClass("hide");     
       }
   });
   
})
function get_select01(url,val,level,obj,onvalue,con) {
    if(!$.trim(url)){
      alert("未设置请求路径！");
      return ;
    }
    if($.trim(onvalue)){
            var array = onvalue.split(",");
            for(i=0;i<array.length;i++){
              $("."+array[i]).html('<option value="0">--请选择--</option>');
              $("#"+array[i]).html('<option value="0">--请选择--</option>');
            }
    }
    
    $.ajax({
        url: url+"&id="+val+"&level="+level,
        type: 'get',
        dataType: 'json',
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("错误信息: 系统超时，请求错误！");
        },
        success: function(data) {
            // alert(data.str);
             $("#" + obj).html(data.str); 
        }
    });
}

//闪烁
$(function(){
    var i = 0; 
    setInterval(function () {  
        if(i++ % 2){
           $("#msg_shan").hide(); 
        }else{
           $("#msg_shan").show();   
        }
   },500);
});

function baiozhu(alertmsg,url){
        if(sub_go != 0 || ($.trim(alertmsg) && !confirm(alertmsg))){
           return ;
        }
        if(sub_go == 0){
            //alert($("#biaozhu-form").serialize());
             $.ajax({
                        url: url,
                        type: 'post',
                        data:$("#biaozhu-form").serialize(),
                        dataType: 'json',
                        beforeSend: function(){	//开始上传 
                            //$(".error").html('正在处理中，请稍后......');
                            sub_go = 1;
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("错误信息: 系统超时，请求错误！");
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';	//获得进度
                            //$(".error").html(percentVal);	//显示上传进度百分比
                        },
                        success: function(data) {
                             if(data.code>0){
                                 alert(data.error_txt+"("+data.code+")");
                             }else{
                                 alert(data.error_txt);
                                 location.reload();
                             }
                        },
                        complete: function() {
                            sub_go = 0;
                        }
          });  
          
    }
    return false;
}

function confirms(msg,url,open){
    if(confirm(msg)){
       location.href=""+url;
    }
    if(open==1)
        window.open(""+url);
}
function get_select(url,val,level,obj,onvalue,con) {
    if(!$.trim(url)){
      alert("未设置请求路径！");
      return ;
    }
    if($.trim(onvalue)){
            var array = onvalue.split(",");
            for(i=0;i<array.length;i++){
              $("."+array[i]).html('<option value="0">--请选择--</option>');
              $("#"+array[i]).html('<option value="0">--请选择--</option>');
            }
    }

    
    $.ajax({
        url: url+"&id="+val+"&level="+level,
        type: 'get',
        dataType: 'json',
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("错误信息: 系统超时，请求错误！");
        },
        success: function(data) {
            // alert(data.str);
             $("#" + obj).html(data.str); 
        }
    });
}

function getClassAttr(url,value,obj){
          if(!$.trim(url)){
                return alert("未设置请求路径！");
          }
          if(!$.trim(value)){
               return alert("值为获取到！");
          }
          
          $.ajax({
                url: url+"&classid="+value,
                type: 'get',
                dataType: 'json',
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("错误信息: 系统超时，请求错误！");
                },
                success: function(data) {
                    if(data.error>0){
                            if($.trim(data.error_txt))
                                return alert(data.error_txt);
                            else
                                return false;
                    }else{
                            $("#" + obj).html(data.str); 
                    }
                    // alert(data.str);
                     
                }
        });
           
       return false;
}


sub_go=0;
function _POST(url,code){
    
    if(!$.trim(code)) code=0;
    $(".error").html("");
    var content = $(window.frames[0].document).find(".ke-content").html();
    //alert($(".form").serialize())
    if(sub_go == 0){
         $.ajax({
                    url: url,
                    type: 'post',
                    data:$(".form").serialize()+"&content="+content,
                    dataType: 'json',
                    beforeSend: function(){	//开始上传 
                        $(".error").html('正在处理中，请稍后......');
                        sub_go = 1;
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $(".error").html("错误信息: 系统超时，请求错误！");
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';	//获得进度
                        $(".error").html(percentVal);	//显示上传进度百分比
                    },
                    success: function(data) {
                        if(code >0){
                                Result_Code(code,data);
                        }else{
                                if(data.error>0){
                                    $(".error").html(data.error_txt+"("+data.error+")"); 
                                }else{
                                    Result_Code(code,data);
                                }
                        }
                    },
                    complete: function() {
                        sub_go = 0;
                    }
         });
     }
     return false;
}
function Result_Code(code,data){
   if(code ==0){
      location.href=""+data.error_txt;
   }
   if(code == 1){
        if(data.error >0){
             alert(data.error_txt+"("+data.error+")");
        }else{
             alert(data.msg);
             location.href=""+data.error_txt;
        }
   }
}
function _GET(url,code){
    if(sub_go == 0){
         $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function(){	//开始上传 
                        sub_go = 1;
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                       alert("错误信息: 系统超时，请求错误！");
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';	//获得进度
                    },
                    success: function(data) {
                          G_code(code,data);
                    },
                    complete: function() {
                        sub_go = 0;
                    }
         });
     }
     return false;
}

function G_code(code,data){
    if(code == 0){
        if(data.error >0){
            alert(data.error_txt+"("+data.error+")");
        }else{
             location.href=""+data.error_txt;
        }
    }
    
}


