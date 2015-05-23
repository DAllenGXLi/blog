

<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\models\Users;


$js = 'document.getElementById("navigation_type_'.NAV_ARTICLE_NUM.'").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);


$js_navigation = 'document.getElementById("navigation_type_2").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);


foreach ($models as $model) {
    ?>

<!--置顶-->
<?php
    if($model->change_at == KEEP_TOP_DATE)
    {?>

        <span class="label label-primary">置顶</span>

    <?php
    }
    ?>

    <div class="panel panel-info">
        <div class="panel-heading">
<!--            头像-->
            <span style="float: left; position: relative; bottom: 8px">
            <img src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= Users::findOne($model->user_id)->head_portrait ?>" height="32px"   /></span>
            <!--            文章标题-->
            <a href="
            <?= Yii::$app->urlManager->createUrl(['user/articles/specific','id'=>$model->id]) ?>
            "><h2 class="panel-title"><b>
                      <?= Html::encode(substr($model->title,0,ARTICLE_TITLE_REVIEW_NUM)) ?></b></h2></a>
<!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">
                    作者：<a><?=Html::encode( Users::findOne($model->user_id)->username ) ?></a></span>
<!--          置顶则不输出日期-->
                <?php
                if($model->change_at != KEEP_TOP_DATE)
                 {?>

                     日期：<?= Html::encode($model->create_at) ?>

                <?php
                }
                ?>

                <span style="margin-left: 10px">浏览：<?= $model->visited_num ?></span>
                <span style="margin-left: 10px">点赞：<?= $model->thumb_up ?></span>
            </span>
        </div>
        <div class="panel-body">
            <span class="article">
            <?=  substr($model->content,0,ARTICLE_REVIEW_NUM).' ...' ?>
                </span>

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