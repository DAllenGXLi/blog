<?php
//引入全局样式，js文件等，设定背景颜色，框架
use yii\helpers\Html;
use app\models\Information;

$this->registerCssFile('css/bootstrap.min.css');
$this->registerJsFile('js/jquery-1.11.2.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/bootstrap.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerCssFile('css/main.css');

//回到顶部插件
$this->registerCssFile('css/style.css');
$this->registerJsFile('js/script.js',['position'=>\yii\web\View::POS_HEAD]);
//导航效果css
$this->registerCssFile('nav/css/_css.css');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body background="<?=  IMAGE_ROOT ?>/home/bg_img.jpg" style="background-color: rgba(228, 228, 229, 0.89); ">
        <?php $this->beginBody() ?>

        <div id="nav_bg"></div>

        <div id="div_main">

            <!--   top-->
                <nav class=" navbar navbar-fixed-top">
                <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <span class="nav_logo_title">dou</span>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="_menu ">
                                    <li><a href="
                <?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">主页</a></li>
                                    <li><a href="
                <?= Yii::$app->urlManager->createUrl(["user/articles/index",'class'=>'ALL']) ?>">文章</a></li>

                                    <li><a href="#">娱乐</a>
                                        <ul class="_submenu">
                                            <li><a href="#">音乐</a></li>
                                            <li><a href="#">电影</a></li>
                                            <li><a href="#">游戏</a></li>
                                            <li><a href="#">图片</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">留言板</a></li>
                                </ul>


                        <!--                    如果已登陆，显示用户信息-->
                        <?php
                        if (!\Yii::$app->user->isGuest)  {
                        $model = Yii::$app->user->identity;
                        ?>

<!--                        头像-->
                         <span class="nav_user">
                                <ul class="_menu">
                                    <li><a href="#">
                                            <img src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= $model->head_portrait ?>" height="40px"  />
<!--                                           信息量-->
                                            <span class="badge head_message_label">
                                        <?= Information::find()->where(['target_user_id'=>Yii::$app->user->identity->id])->count() ?>
                                    </span>
                                        </a>
                                        <ul class="_submenu">

                                            <li>
                                                <a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/setting/index']) ?>">主页
                                                <span class="badge message_label">
                                        <?= Information::find()->where(['target_user_id'=>Yii::$app->user->identity->id])->count() ?>
                                    </span>
                                                </a>
                                            </li>

                                            <li>
                                                <a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/setting/index']) ?>">
                                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 设置</a>
                                            </li>

                                            <li>
                                                <a role="menuitem" tabindex="-1" href="#">
                                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 收藏</a>
                                            </li>

                                            <li><a href="#">
                                                    <a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/default/logout']) ?>">
                                                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                        </span>

                        <?php } ?>


                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>







        <div class="container main_body" >

          <?= $content ?>
        </div>
<!--            备案信息-->
<!--            <div class="page_tail" align="center">-->
<!--                <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备15037705号-1</a>-->
<!--            </div>-->



        </div>
        <?php $this->endBody() ?>
    </body>

</html>

<?php $this->endPage() ?>

