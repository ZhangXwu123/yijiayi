<?php if (!defined('THINK_PATH')) exit();?>            <div class="mrg-bottom100"></div>            
            <div class="floor-box">
                <div class="beian wrap">
                    <p class="fnav">
                        <?php echo $nav2; ?>
                    </p>
                    <div class="wx"><img src="__PUBLIC__/Home/images/wx.jpg"/> <p>微信公众号</p></div>
                    <p class="bz"><?php echo $footinfo; ?></p>   
                    <p class="banh"><?php echo $beian ?></p>
                </div>
           </div>
            <?php if(!$login_status){ ?>
                <form class="form" method="post">
                    <div class="litte-box hide">
                                <div class="title-box">
                                    <a id="close">关闭</a>
                                    <div class="cl"></div>
                                </div>
                                <div class="reg hide">
                                            <div class="list-box">
                                                    <div class="name" style="letter-spacing: 1px;">用&nbsp;户&nbsp;名：</div>
                                                    <input type="text" class="input-txt" name="username"/>
                                                    <div class="cl"></div>
                                            </div>
                                             <div class="list-box">
                                                    <div class="name ">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</div>
                                                    <input type="password" class="input-txt" name="password"/>
                                                    <div class="cl"></div>
                                            </div>
                                             <div class="list-box">
                                                    <div class="name">确认密码：</div>
                                                    <input type="password" class="input-txt" name="repassword"/>
                                                    <div class="cl"></div>
                                            </div>
                                            <div class="list-box">
                                                    <div class="name">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：</div>
                                                    <select class="select-box" name="sex">
                                                        <option value="1">男</option>
                                                        <option value="2">女</option>
                                                    </select>
                                                    <div class="cl"></div>
                                            </div>
                                            <div class="list-box">
                                                    <div class="name"  style="letter-spacing: 1px;">手&nbsp;机&nbsp;号：</div>
                                                    <input type="text" class="input-txt" name="mobile"/>
                                                    <div class="cl"></div>
                                            </div>
                                            <div class="list-box-butt">
                                                    <span onclick="_POST('<?php echo $Reg; ?>')">立即注册</span>
                                            </div>
                                </div>

                                <div class="login">
                                            <div class="list-box">
                                                    <div class="name" style="letter-spacing: 1px;">用&nbsp;户&nbsp;名：</div>
                                                    <input type="text" class="input-txt" name="LoginUsername"/>
                                                    <div class="cl"></div>
                                            </div>
                                             <div class="list-box">
                                                    <div class="name ">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</div>
                                                    <input type="password" class="input-txt" name="LoginPassword"/>
                                                    <div class="cl"></div>
                                            </div>
                                            <div class="list-box-butt">
                                                <span onclick="_POST('<?php echo $Login; ?>')">立即登录</span>
                                            </div>
                                </div>
                                <div class="error" style="color:red;margin-top: 10px;text-align: center;font-size: 12px; "></div>
                    </div>
                </form>
            <?php } ?>
    </body>
</html>