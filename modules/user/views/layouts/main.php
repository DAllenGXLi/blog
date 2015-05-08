<?php
//基础导航及logo
?>
<?php
$this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>
    <div id="div_main">


        <!--   top-->
        <div style="background-color: #3c3c3c; height: 50px">
            <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

                <div class="row">
                        <span>doudou's home</span>

                  <?php
                  if( !Yii::$app->user->identity==null ) {
                      echo '
                            <span style="float: right"><a href="'. Yii::$app->urlManager->createUrl(["user/default/logout"]) .'">'.Yii::$app->user->identity->username.'</a></span>
                    ';
                  }
                  ?>

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