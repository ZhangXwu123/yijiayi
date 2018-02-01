<?php if (!defined('THINK_PATH')) exit();?>
    <!--下操作栏-->
    <footer>
        <!--education-->
        <div class="content_item education">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹 <span>成就大学之美</span></div>
                    <span class="font20">One plus one art education</span>

                </div>
                <form action="" class="eduction_content">
                    <div class="education_items">
                        <div class="education_item text-center">
                            <img src="__PUBLIC__/Home/images/education1.jpg" alt="">
                            <p>选床位</p>
                        </div>
                        <div class="education_item text-center">
                            <img src="__PUBLIC__/Home/images/education2.jpg" alt="">
                            <p>选床位</p>
                        </div>
                        <div class="education_item text-center">
                            <img src="__PUBLIC__/Home/images/education3.jpg" alt="">
                            <p>选床位</p>
                        </div>
                        <div class="education_item text-center">
                            <img src="__PUBLIC__/Home/images/education4.jpg" alt="">
                            <p>选床位</p>
                        </div>
                    </div>
                    <div class="education_form clear">
                        <select name="selectClass" id="selectClass" class="fl">
                            <option value="选班级">选班级</option>
                        </select>
                        <select name="selectEducation" id="selectEducation" class="fr">
                            <option value="选大学">选大学</option>
                        </select>
                        <select name="selectTeach" id="selectTeach" class="fl">
                            <option value="选名师">选名师</option>
                        </select>
                        <input type="text" placeholder="您的姓名" class="fr">
                        <select name="selectBed" id="selectBed" class="fl">
                            <option value="选床位">选床位</option>
                        </select>
                        <input type="text" placeholder="您的电话" class="fr">
                    </div>
                    <div class="education_btn text-center">
                        <a href="" class="btn btn-red border35 font36">立刻报名</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="copyright  text-center">
            <?php echo $footinfo; ?> <?php echo $beian ?>
        </div>
        <div class="footer_nav">
            <a href="tel:17600103465" class="footer_nav_item">
                <p><img src="__PUBLIC__/Home/images/tel1.png" alt=""></p>
                <span>拨打电话</span>
            </a>
            <a href="" class="footer_nav_item">
                <p><img src="__PUBLIC__/Home/images/inpuiry.png" alt=""></p>
                <span>在线咨询</span>
            </a>
            <a href="" class="footer_nav_item">
                <p><img src="__PUBLIC__/Home/images/live1.png" alt=""></p>
                <span>网络直播</span>
            </a>
        </div>
        <!--education-->
    </footer>
    <!--下操作栏结束-->
</div>
</body>
</html>