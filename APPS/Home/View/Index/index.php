
            <!--幻灯部分-->
            <div class="slide-box">
                <div class="slide-img">
                    <?php echo  $slideStr; ?>
                </div>
                <div class="slide-list wrap">
                    <div class="list-box">
                      <?php echo $listSlidSpan; ?>
                    </div>
                </div>
            </div>
            
            <!--1-->
            <div class="itext-box wrap">
                    <h1>关于积成航科</h1>
                    <a>ABOUT INTEGARTION</a>
            </div>
            
            <div class="in1-box wrap">
               <div class="content">
                    <div class="left">
                        <?php echo $arr["adC1"]; ?>
                    </div>
                    <div class="right">
                        <div class="nr">
                          <?php echo $descInfo; ?>
                        </div>
                        <div class="cz-more">
                            <a href="<?php echo $asHref; ?>"><span class="cz-more-sp">查找更多<span></span></span></a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
            </div>
            
             <!--2-->
            <div class="itext-box wrap">
                    <h1>新闻资讯</h1>
                    <a>INTEGARTION NEWS</a>
            </div>
            
            <div class="in1-box wrap">
               <div class="content">
                    <div class="left-2">
                         <h1 class="tt8">公司动态
                                <span>
                                    <a href="<?php echo $_url01more; ?>">更多...</a>
                                </span>
                         </h1>
                        
                        <div class="new-box">
                                <div class="newBox-top">
                                    <div class="tleft01 dongtai">
                                        <?php echo $dongtaiStr; ?>
                                    </div>
                                    <div class="tright01">
                                        <span><a href="<?php echo $_url01; ?>"><?php echo $_Title01; ?></a></span>
                                        <p class="txt"><?php echo $_Des01; ?></p>
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <ul>
                                      <?php echo $_list01; ?>
                                </ul>
                        </div>
                    </div>
                   
                   
                    <div class="right-2">
                         <h1 class="tt8">行业动态
                            <span>
                                <a href="<?php echo $_url02more; ?>">更多...</a>
                            </span>
                        </h1>
                         <div class="new-box">
                                <div class="newBox-top">
                                    <div class="tleft01 hangye">
                                        <?php echo $hangyeStr; ?>
                                    </div>
                                    <div class="tright01">
                                        <span><a href="<?php echo $_url02; ?>"><?php echo $_Title02; ?></span>
                                        <p class="txt"><?php echo $_Des02; ?></p>
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <ul>
                                        <?php echo $_list02; ?>
                                </ul>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
            </div>
             
             
             
             <!--3-->
            <div class="itext-box wrap">
                    <h1>产品展示</h1>
                    <a>积成航科旗下子公司斯利德产品展示</a>
            </div>
            
             <div class="product-box wrap">
                 <div class="content">
                        <div class="left"></div>
                        <div class="listbox">
                            <div class="yidong">
                                <?php echo $ProStr; ?>
                            </div>
                        </div>
                        <div class="right"></div>
                 </div>
             </div>
             <a href="<?php echo $ProMore; ?>">
                <div class="geduo wrap">
                   查看更多...
                </div>
             </a>
             
             