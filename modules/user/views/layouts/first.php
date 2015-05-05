<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/4/25
 * Time: 18:33
 */

?>

<?php $this->beginContent('@app/modules/user/views/layouts/main.php'); ?>

    <!--    navigation-->
    <ul class="nav nav-pills nav nav-pills nav-justified">
        <li role="presentation" class="active"><a href="<?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
        <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
        <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
        <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
        <li role="presentation"><a href="#">Contact</a></li>
    </ul>


<div class="row" style="margin-top: 10px; margin-bottom: 20px;">
    <div class="col-md-9 col-md-offset-1">

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
                    <img src="/liguoxian/modules/user/res/home/1.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 1
                    </div>
                </div>
                <div class="item">
                    <img src="/liguoxian/modules/user/res/home/2.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 2
                    </div>
                </div>
                <div class="item">
                    <img src="/liguoxian/modules/user/res/home/3.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 3
                    </div>
                </div>
                <div class="item">
                    <img src="/liguoxian/modules/user/res/home/4.jpg" alt="...">
                    <div class="carousel-caption">
                        picture 4
                    </div>
                </div>

            </div>
        </div>

        <!---------------------------navigation2---------------------------->
        <div class="row">
            <div class="col-md-10 col-md-offset-0">
                <ul class="nav nav-tabs"  style="margin-top: 20px">
                    <li role="presentation" class="active"><a href="#"><b>Best Of The Week</b></a></li>
                    <li role="presentation"><a href="">Article</a></li>
                    <li role="presentation"><a href="">Music</a></li>
                    <li role="presentation"><a href="">Film</a></li>
                    <li role="presentation"><a href="">Picture</a></li>
                    <li role="presentation"><a href="">comment</a></li>
            </div>
        </div>


    </div>
<!--    col-->
</div>
<!--row-->

<?= $content ?>

<?php $this->endContent(); ?>