<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/4/25
 * Time: 18:33
 */
$js_navigation = 'document.getElementById("navigation_type_'.NAV_HOME_NUM.'").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);
?>

<?php $this->beginContent('@app/modules/user/views/layouts/main.php'); ?>



<div class="row" style="margin-top: 10px; margin-bottom: 20px;">
    <div class="col-lg-9 col-lg-offset-1">

        <div id="carousel-example-generic"  class="carousel slide" data-ride="carousel" style="margin-left: 80px">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div   class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?=  IMAGE_ROOT ?>/home/1.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 1
                    </div>
                </div>
                <div class="item">
                    <img src="<?=  IMAGE_ROOT ?>/home/2.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 2
                    </div>
                </div>
                <div class="item">
                    <img src="<?=  IMAGE_ROOT ?>/home/3.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 3
                    </div>
                </div>
                <div class="item">
                    <img src="<?=  IMAGE_ROOT ?>/home/4.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 4
                    </div>
                </div>

            </div>
        </div>

        <!---------------------------navigation2---------------------------->
        <div class="row">
            <div class="col-lg-10 col-lg-offset-0">
                <ul class="nav nav-tabs"  style="margin-top: 20px">
                    <li role="presentation" class="active"><a href="#" style="background-color: #c6c6c6"><b>Best Of The Week</b></a></li>
                    <li role="presentation" id="main_article_nav"><a href="
                    <?= Yii::$app->urlManager->createUrl(['user/main/index']) ?>">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 文章</a></li>
                    <li role="presentation" id="main_music_nav">
                        <a href="<?= Yii::$app->urlManager->createUrl(['user/main/music']) ?>">
                            <span class="glyphicon glyphicon-music" aria-hidden="true"></span> 音乐</a></li>
<!--                    <li role="presentation"><a href="">-->
<!--                            <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Film</a></li>-->
<!--                    <li role="presentation"><a href="">-->
<!--                            <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> Picture</a></li>-->
                    <li role="presentation" id="main_comment_nav"><a href="
                    <?= Yii::$app->urlManager->createUrl(['user/main/comment']) ?>">
                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 神评论</a></li>
            </div>
        </div>


    </div>
<!--    col-->
</div>
<!--row-->

<?= $content ?>

<?php $this->endContent(); ?>