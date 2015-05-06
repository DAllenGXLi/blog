<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/5
 * Time: 20:54
 */
use yii\helpers\Html;
?>


<!--    navigation-->
<ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
    <li role="presentation" class="active"><a href="<?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
    <li role="presentation"><a href="#">Contact</a></li>
</ul>


<div class="panel panel-info">
    <div class="panel-heading">
        <!--            文章标题-->
        <h2 class="panel-title article_title"><b><?= Html::encode($model->title) ?></b></h2>
        <!--        文章时间-->
        <span class="comment-detail" style="position: relative; bottom: 15px;"><?= Html::encode($model->create_at) ?></span>
    </div>
    <div class="panel-body">
         <span class="article">
        <?=  Html::encode($model->content) ?>
             </span>
        <a type="button" class="btn btn-sm btn-info comment-button">评论</a>
        <a type="button" class="btn btn-sm btn-success comment-button">点赞</a>
    </div>
</div>