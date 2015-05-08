

<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\models\Users;


$js = 'document.getElementById("article_type_1").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);


$js_navigation = 'document.getElementById("navigation_type_2").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);


foreach ($models as $model) {
// 在这里显示 $model
    //获取文章作者
    $user_id = $model->user_id;
    $user = Users::findOne($user_id);
    ?>


    <div class="panel panel-info">
        <div class="panel-heading">
<!--            文章标题-->
            <a href="
            <?= Yii::$app->urlManager->createUrl(['user/articles/specific','id'=>$model->id]) ?>
            "><h2 class="panel-title"><b><?= Html::encode($model->title) ?></b></h2></a>
<!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">
                    <a><?=Html::encode($user->username) ?></a></span>
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