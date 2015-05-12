<?php
//基础导航及logo
?>
<?php
$this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>
    <div id="div_main">


        <!--   top-->
        <div class="nav_head">
            <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

                <div class="row">
                        <span>doudou's home</span>

<!--                    如果已登陆，显示用户信息-->
                  <?php
                  if( !Yii::$app->user->identity==null ) {
                      ?>

                      <span class="dropdown nav_user" style="float: right">
<!--                          用户信息-->
                        <a class=" dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            <span>
                      <img src="<?=  DOCUMENT_ROOT ?>/res/img/head_portrait/000.jpg" height="42px"  />
                                <?=Yii::$app->user->identity->username?></span>

                        </a>
                          <!--                  下拉菜单    -->
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" >
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 个人主页</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 我的动态</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 账户设置</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 我的收藏</a></li>
                            <li role="presentation" class="divider" style="background-color: rgba(93, 93, 94, 0.89)"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/default/logout']) ?>">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出登录</a></li>
                        </ul>
                    </div>

                  <?php } ?>



                </div><!-- /.row -->
            </div>
        </div>
    </div>


        <div class="container" style="padding-bottom: 100px; margin-top: 10px; margin-bottom: 20px; background-color: rgba(244, 244, 245, 0.89)" >

            <!--    navigation-->
            <ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
                <li role="presentation" id="navigation_type_1"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
                <li role="presentation" id="navigation_type_2"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
                <li role="presentation" id="navigation_type_3"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
                <li role="presentation" id="navigation_type_4"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
                <li role="presentation" id="navigation_type_5"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/contact/index"]) ?>">Contact</a></li>
            </ul>

            <?= $content ?>

        </div>


<?php $this->endContent(); ?>