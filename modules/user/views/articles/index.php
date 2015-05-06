<!--    navigation-->
<ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
    <li role="presentation" class="active"><a href="<?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
    <li role="presentation"><a href="<?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
    <li role="presentation"><a href="#">Contact</a></li>
</ul>

<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;


foreach ($models as $model) {
// 在这里显示 $model
    ?>


    <div class="panel panel-info">
        <div class="panel-heading">
<!--            文章标题-->
            <a href="#"><h2 class="panel-title"><b><?= Html::encode($model->title) ?></b></h2></a>
<!--        文章时间-->
            <span class="comment-detail" style="position: relative; bottom: 15px;"><?= Html::encode($model->create_at) ?></span>
        </div>
        <div class="panel-body">
            <?=  Html::encode(substr($model->content,0,300).' ...') ?>
            <a type="button" class="btn btn-sm btn-info comment-button">阅读全文</a>
            <a type="button" class="btn btn-sm btn-info comment-button">评论</a>
            <a type="button" class="btn btn-sm btn-success comment-button">点赞</a>
        </div>
    </div>



<br/>


<?php
}

// 显示分页
echo LinkPager::widget([
'pagination' => $pages,
]);


?>