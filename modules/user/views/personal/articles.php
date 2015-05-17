<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/16
 * Time: 17:06
 */
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\models\Users;

$js = 'document.getElementById("personal_nav_articles").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);

foreach( $models as $model )
{
?>

    <div class="panel panel-info">
        <div class="panel-heading">
            <!--            头像-->
            <span style="float: left; position: relative; bottom: 8px">
            <img src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= Users::findOne($model->user_id)->head_portrait ?>" height="32px"   /></span>
            <!--            文章标题-->
            <a href="
            <?= Yii::$app->urlManager->createUrl(['user/articles/specific','id'=>$model->id]) ?>
            "><h2 class="panel-title"><b><?= Html::encode($model->title) ?></b></h2></a>
            <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">

                    <a><?=Html::encode( Users::findOne($model->user_id)->username ) ?></a></span>
                <?= Html::encode($model->create_at) ?></span>

        </div>
        <div class="panel-body">
            <span class="article">
            <?=  substr($model->content,0,ARTICLE_REVIEW_NUM).' ...' ?>
                </span>
            <a type="button" class=""></a>
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

