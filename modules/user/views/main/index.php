
<?php
use app\models\Users;
use yii\helpers\Html;

$js_navigation = 'document.getElementById("main_article_nav").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);

foreach ($models as $model) {
    ?>

<div class="row">
    <div class="col-md-offset-1 col-md-10">


    <!--置顶-->
    <?php
    if ($model->change_at == KEEP_TOP_DATE) {
        ?>

        <span class="label label-success">置顶</span>

    <?php
    }
    ?>


    <div class="panel panel-info">
        <div class="panel-heading">
            <!--            头像-->
            <span style="float: left; position: relative; bottom: 8px">
            <img src="<?= HEAD_PORTRAIT_ROOT ?>/<?= Users::findOne($model->user_id)->head_portrait ?>"
                 height="32px"/></span>
            <!--            文章标题-->
            <a href="
            <?= Yii::$app->urlManager->createUrl(['user/articles/specific', 'id' => $model->id]) ?>
            "><h2 class="panel-title"><b>
                        <?= Html::encode(substr($model->title, 0, ARTICLE_TITLE_REVIEW_NUM)) ?></b></h2></a>
            <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">
                    作者：<a><?= Html::encode(Users::findOne($model->user_id)->username) ?></a></span>
<!--          置顶则不输出日期-->
                <?php
                if ($model->change_at != KEEP_TOP_DATE) {
                    ?>

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
          <?=   substr($model->summary, 0, ARTICLE_REVIEW_NUM) . ' ...' ?>
                </span>

        </div>
    </div>

    </div>
</div>

<?php
    }
    ?>


