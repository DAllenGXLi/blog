<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/4/25
 * Time: 18:33
 */

?>

<?php $this->beginContent('@app/modules/user/views/layouts/main.php'); ?>

    <div class="row" style="margin-top: 10px; margin-bottom: 20px;">
        <div class="col-md-9 col-md-offset-1">
            <div id="carousel-example-generic"  class="carousel slide" data-ride="carousel">
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
                        <img src="/liguoxian.com/res/home/1.jpg" alt="...">
                        <div class="carousel-caption">
                            picture 1
                        </div>
                    </div>
                    <div class="item">
                        <img src="/liguoxian.com/res/home/2.jpg" alt="...">
                        <div class="carousel-caption">
                            picture 2
                        </div>
                    </div>
                    <div class="item">
                        <img src="/liguoxian.com/res/home/3.jpg" alt="...">
                        <div class="carousel-caption">
                            picture 3
                        </div>
                    </div>
                    <div class="item">
                        <img src="/liguoxian.com/res/home/4.jpg" alt="...">
                        <div class="carousel-caption">
                            picture 4
                        </div>
                    </div>



                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>



        <!---------------------------navigation2---------------------------->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul class="nav nav-tabs"  style="margin-top: 20px">
                    <li role="presentation" class="active"><a href="#">Best Of The Week</a></li>
                    <li role="presentation"><a href="<?php
                        Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl())
                        ?>">Article</a></li>
                    <li role="presentation"><a href="">Music</a></li>
                    <li role="presentation"><a href="">Film</a></li>
                    <li role="presentation"><a href="">Picture</a></li>
                    <li role="presentation"><a href="">comment</a></li>
            </div>
        </div>


    </div><!--row-->

<?= $content ?>

<?php $this->endContent(); ?>