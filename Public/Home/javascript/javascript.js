$(function(){
    //首页幻灯 一
    var timer=null;
    var num=0;
    var len=$('.slide-img img').length;
    function autoplay(){
        num++;
        if (num>len-1) {
            num=0
        }
        $('.slide-img img').eq(num).removeClass("hide").siblings("img").addClass("hide");
        $('.list-box .span-box').eq(num).addClass("mo").siblings(".span-box").removeClass("mo");
    }
    timer=setInterval(autoplay,3000);
    $('.slide-img img').hover(function() {
        clearInterval(timer);
    }, function() {
        clearInterval(timer);
        timer=setInterval(autoplay,3000);
    });
    
    $('.list-box .span-box').mouseover(function(){
        clearInterval(timer);
        var index = $(".list-box .span-box").index(this);
        $('.slide-img img').eq(index).removeClass("hide").siblings("img").addClass("hide");
        $('.list-box .span-box').eq(index).addClass("mo").siblings(".span-box").removeClass("mo");
    }).mouseout(function(){
         clearInterval(timer);
         timer=setInterval(autoplay,3000);
    });
    
    //首页幻灯 二
    var timer2=null;
    var num2=0;
    var len2=$('.dongtai a').length;
    function autoplay2(){
        num2++;
        if (num2>len-1) {
            num2=0
        }
        $('.dongtai a').eq(num2).removeClass("hide").siblings("a").addClass("hide");
    }
    timer2=setInterval(autoplay2,3000);
    
    //首页幻灯 三
    var timer3=null;
    var num3=0;
    var len3=$('.hangye a').length;
    function autoplay3(){
        num3++;
        if (num3>len3-1) {
            num3=0
        }
        $('.hangye a').eq(num3).removeClass("hide").siblings("a").addClass("hide");
    }
    timer3=setInterval(autoplay3,3000);
    
    
    $("#close").click(function(){
        $(".litte-box").addClass("hide");
        $(".error").html("");
    });
   

    i  =0;
    var timer4=null;
    timer4=setInterval(yidong,10);
    $(".left").click(function(){
         yidong(1,1060);
    });
    $(".right").click(function(){
         yidong(2,1060);
    });
    
    $('.listbox .list-l').mouseover(function(){
        clearInterval(timer4);
    }).mouseout(function(){
         clearInterval(timer4);
         timer4=setInterval(yidong,10);
    });
    
});

function yidong(F,cm){
      var blw  =$(".yidong .list-l").width();  
      var left = parseInt($(".listbox").scrollLeft()) ;
      if(!$.trim(F)) F=1;
      if(!$.trim(cm)) cm=0;
      blw =blw+(32*2);
      if(F ==1){
                if(Math.abs(left) <= blw){
                    $(".listbox").scrollLeft((i+cm));
                    i++;
                }else{
                    i=0;
                    ydEM(F);
                    $(".listbox").scrollLeft(i);
                }
      }
      if(F ==2){
           if(Math.abs(left) <= blw){
                 $(".listbox").scrollLeft((i+cm));
                 i++;
           }else{
                i=0;
                ydEM(F);
                $(".listbox").scrollLeft(0);
           }
      }
}
function ydEM(F){
    var len =$('.yidong .list-l').length; 
    var hval="";
    if(F ==1){
        hval =$('.yidong .list-l').eq(0).html();
        $('.yidong').append('<div class="list-l">'+hval+'</div>');
        $('.yidong .list-l').eq(0).remove();
    }else if(F ==2){
        hval =$(".yidong .list-l").eq(len-1).html();
        $('.yidong').before('<div class="list-l">'+hval+'</div>');
        $('.yidong .list-l').eq(len-1).remove();
    }
    
}

function clickLogin(){
    $(".error").html("");
    $(".litte-box").removeClass("hide");
    $(".litte-box .reg").addClass("hide");
    $(".litte-box .login").removeClass("hide");
}
function clickReg(){
    $(".error").html("");
    $(".litte-box").removeClass("hide");
    $(".litte-box .login").addClass("hide");
    $(".litte-box .reg").removeClass("hide");
}


sub_go=0;
function _POST(url){
    $(".error").html("");
    if(sub_go == 0){
         $.ajax({
                    url: url,
                    type: 'post',
                    data:$(".form").serialize(),
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
                        if(data.error == "666"){
                            clickLogin();
                            return ;
                        }
                        if(data.error>0){
                            $(".error").html(data.error_txt); 
                        }else{
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

