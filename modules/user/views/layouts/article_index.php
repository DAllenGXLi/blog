<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/6
 * Time: 18:56
 */

$this->beginContent('@app/modules/user/views/layouts/main.php'); ?>





<div class="row">

    <div class="col-md-9">
<?= $content ?>
    </div>

    <div class="col-md-3">


<!--边侧菜单-->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<!--      doudou      -->
            <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed side_nav" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseTwo">
                            doudou博文
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <!--                        内导航-->

                        <ul class="nav nav-stacked">
                            <li role="presentation"><a href="#">doudou</a></li>
                        </ul>

                        <!--                        -->
                    </div>
                </div>
            </div>

<!--      技术      -->
            <div class="panel panel-warning">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed side_nav" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            技术论坛
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
<!--                        内导航-->

                        <ul class="nav nav-stacked">
                            <li role="presentation"><a href="#">C/C++</a></li>
                            <li role="presentation"><a href="#">Web前端</a></li>
                            <li role="presentation"><a href="#">Web Server</a></li>
                            <li role="presentation"><a href="#">Linux</a></li>
                            <li role="presentation"><a href="#">Others</a></li>
                        </ul>

<!--                        -->
                    </div>
                </div>
            </div>




<!--      吃喝玩乐      -->
            <div class="panel panel-info">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed side_nav" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            吃喝玩乐
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <!--                        内导航-->

                        <ul class="nav nav-stacked">
                            <li role="presentation"><a href="#">去哪儿吃</a></li>
                            <li role="presentation"><a href="#">去哪儿玩</a></li>
                            <li role="presentation"><a href="#">新鲜玩意儿</a></li>
                        </ul>

                        <!--                        -->
                    </div>
                </div>
            </div>



<!--     其他       -->
            <div class="panel panel-danger">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed side_nav" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                            运动达人
                        </a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <!--                        内导航-->

                        <ul class="nav nav-stacked">
                            <li role="presentation"><a href="#">篮球专区</a></li>
                            <li role="presentation"><a href="#">足球天下</a></li>
                            <li role="presentation"><a href="#">健身房</a></li>
                            <li role="presentation"><a href="#">一起骑行吧</a></li>
                        </ul>

                        <!--                        -->
                    </div>
                </div>
            </div>

<!--            -->
        </div>
<!---->



        <a class="btn btn-danger btn-lg btn-block" style="margin-top: 30px" href="
        <?= Yii::$app->urlManager->createUrl(["user/articles/write"]) ?>" role="button">发表文章</a>
    </div>

    </div>



<?php $this->endContent(); ?>