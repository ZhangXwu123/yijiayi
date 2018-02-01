<?php if (!defined('THINK_PATH')) exit();?><!--菜单部分-->
        <div class="DQ wrap">
            <?php echo $DQWZ; ?>
        </div>
         
        <div class="main wrap">
            <div class="left-menu">
                  <h1 class="head"><?php echo $mtitle;?></h1>
                  <?php echo $asnav;?>
            </div>
            <div class="right-content">
                <?php echo $infostr;?>
                
                <?php if($page){ ?>
                    <div class="pages-div">
                            <?php echo $page; ?>
                    </div>
                <?php } ?>
            </div>
            <div class="cl"></div>
               
        </div>