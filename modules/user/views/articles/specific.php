<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/5
 * Time: 20:54
 */
use yii\helpers\Html;
$js_navigation = 'document.getElementById("navigation_type_2").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);
?>



<div class="panel panel-info">
    <div class="panel-heading">
        <!--            文章标题-->
        <h2 class="panel-title article_title"><b><?= Html::encode($model->title) ?></b></h2>
        <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">
                    <a><?=Html::encode(Yii::$app->user->identity->username) ?></a></span>
                <?= Html::encode($model->create_at) ?></span>
    </div>
    <div class="panel-body">
         <span class="article">
        <?=  $model->content ?>
             </span>
        <div>
            <a type="button" class="btn btn-sm btn-info comment-button">
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 评论</a>
            <a type="button" class="btn btn-sm btn-success comment-button">
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                <?= Html::encode($model->thumb_up) ?>
            </a>
        </div>
    </div>
</div>