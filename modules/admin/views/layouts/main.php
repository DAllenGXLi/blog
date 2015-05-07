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
                        <span>doudou's backstage</span>

<!--                  --><?php
//                  if( !Yii::$app->user->identity==null ) {
//                      echo '
//                            <span style="float: right"><a href="'. Yii::$app->urlManager->createUrl(["user/default/logout"]) .'">'.Yii::$app->user->identity->username.'</a></span>
//                    ';
//                  }
//                  ?>

                </div><!-- /.row -->
            </div>
        </div>
    </div>

<div class="container-fluid">
<div class="row">
    <div class="col-md-2" style="margin-top: 50px;">
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation"  id="back_nav_id_1"><a href="
        <?= Yii::$app->urlManager->createUrl(["admin/users-search/index"]) ?>">Users</a></li>
        <li role="presentation" id="back_nav_id_2"><a href="
        <?= Yii::$app->urlManager->createUrl(["admin/articles-search/index"]) ?>">Article</a></li>
        <li role="presentation" id="back_nav_id_3" ><a href="
        <?= Yii::$app->urlManager->createUrl(["admin/comments-search/index"]) ?>">Comments</a></li>
        <li role="presentation" id="back_nav_id_4"><a href="
        <?= Yii::$app->urlManager->createUrl(["admin/a/index"]) ?>">MessageBoard</a></li>
    </ul>
</div>

        <div class="col-md-10" style="margin-top: 10px; margin-bottom: 20px; background-color: rgba(244, 244, 245, 0.89)" >


            <?= $content ?>

        </div>


    </div>

    </div>

<?php $this->endContent(); ?>