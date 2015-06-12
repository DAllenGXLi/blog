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
//$this->registerJsFile('js/jquery.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/script.js',['position'=>\yii\web\View::POS_HEAD]);
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


        <div id="div_main">


            <!--   top-->
            <div class="nav_head">
                <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

                    <div class="row">
                        <span>doudou's home (alpha)</span>

                        <!--                    如果已登陆，显示用户信息-->
                        <?php
                        if (!\Yii::$app->user->isGuest)  {
                        $model = Yii::$app->user->identity;
                        ?>

                        <span class="dropdown nav_user" style="float: right">
<!--                          用户信息-->
                        <a class=" dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            <span>
                      <img src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= $model->head_portrait ?>" height="42px"  />
                                <?=Yii::$app->user->identity->username?></span>
                            <!--                                    动态标签 总和-->
                            <span class="badge head_message_label message_label">
                                <?= Information::find()->where(['target_user_id'=>Yii::$app->user->identity->id])->count() ?>
                            </span>
                        </a>
                          <!--                  下拉菜单    -->
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" >
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/personal/index','id'=>Yii::$app->user->identity->id]) ?>">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 个人主页
<!--                                    动态标签 总和-->
                                    <span class="badge message_label">
                                        <?= Information::find()->where(['target_user_id'=>Yii::$app->user->identity->id])->count() ?>
                                    </span></a>
                                </a></li>

                            <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 我的动态
<!--                                    动态标签-->
                                    <span class="badge message_label">42</span></a>
                                </a></li>

                            <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/setting/index']) ?>">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 账户设置</a></li>

                            <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 我的收藏</a></li>

                            <li role="presentation" class="divider" style="background-color: rgba(93, 93, 94, 0.89)"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/default/logout']) ?>">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出登录</a></li>
                        </ul>


                    <?php } ?>

                    </div>

                </div><!-- /.row -->
            </div>


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

