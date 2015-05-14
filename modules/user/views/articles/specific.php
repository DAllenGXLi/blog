<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/5
 * Time: 20:54
 */
use yii\helpers\Html;
use app\models\Users;
use yii\widgets\LinkPager;
$js = 'document.getElementById("navigation_type_'.NAV_ARTICLE_NUM.'").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
?>



<div class="panel panel-info" style="margin-bottom: 40px">
    <div class="panel-heading">

        <!--            头像-->
            <span style="float: left; position: relative; bottom: 4px">
            <img src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= Users::findOne($model->user_id)->head_portrait ?>" height="36px"   /></span>
        <!--            文章标题-->
        <h2 class="panel-title article_title"><b><?= Html::encode($model->title) ?></b></h2>
        <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">
                    <a><?=Html::encode( Users::findOne($model->user_id)->username ) ?></a></span>
                <?= Html::encode($model->create_at) ?></span>
    </div>
    <div class="panel-body">
         <span class="article">
        <?=  $model->content ?>
             </span>
        <div>
            <a type="button" class="btn btn-sm btn-info comment-button" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 评论</a>
            <a type="button" class="btn btn-sm btn-success comment-button">
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                <?= Html::encode($model->thumb_up) ?>
            </a>
        </div>
    </div>
</div>

<!--//评论表单-->
<!-- Small modal -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form name="comments"  method="post" >
                <textarea autofocus="autofocus" name="content" rows="3" cols="37px" style="margin: 7px"></textarea>
                <input type="hidden" name="user_id" value="<?= Yii::$app->user->identity->id ?>">
                <button type="submit" class="btn btn-primary" style="float: right">提交</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">取消</button>
            </form>
        </div>
    </div>
</div>

<!--评论内容-->
<?php
foreach ($models as $_model) {
    // 在这里显示 $model
    $_user = Users::findOne($_model->user_id);
   ?>


    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object head_portrait_middle" src="<?= HEAD_PORTRAIT_ROOT ?>/<?= $_user->head_portrait ?>" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= $_user->username ?></h4>

            <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;">
                <?= Html::encode($model->create_at) ?></span>

<!--            评论内容-->
            <?= $_model->content ?>
        </div>
    </div>


<?php

}

// 显示分页
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>

