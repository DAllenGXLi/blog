<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/4
 * Time: 21:12
 */
?>
<!--    navigation-->
<ul class="nav nav-pills nav nav-pills nav-justified">
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
    <li role="presentation" class="active"><a href="<?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
    <li role="presentation"><a href="#">Contact</a></li>
</ul>