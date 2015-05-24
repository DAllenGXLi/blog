

<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\models\Users;


$js = 'document.getElementById("navigation_type_'.NAV_MB_NUM.'").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
<?php
foreach ($models as $model) {
// 在这里显示 $model
    //获取文章作者
    $user_id = $model->user_id;
    $user = Users::findOne($user_id);
    ?>


    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object head_portrait_middle" src="<?= HEAD_PORTRAIT_ROOT ?>/<?= $user->head_portrait ?>" alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?= $user->username ?></h4>

            <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;">
                <?= Html::encode($model->create_at) ?></span>

            <!--            评论内容-->
            <?= Html::encode($model->content)  ?>
        </div>
    </div>
    <hr>


<?php
}
?>
    </div>
</div>



<!--//评论表单-->
<!-- Small modal -->
<div class="row">
<div style="margin-bottom: 20px" class="col-md-offset-5 col-md-2">
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bs-example-modal-sm">我来说两句</button>

    <div style="margin-top: 15px">
    <?php
    // 显示分页
    echo LinkPager::widget([
        'pagination' => $pages,
    ]);
    ?>
    </div>

</div>
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form name="comments"  method="post" >
                <textarea autofocus="autofocus" class="form-control" rows="3" name="content"></textarea>
                <input type="hidden" name="user_id" value="<?= Yii::$app->user->identity->id ?>">
                <button type="submit" class="btn btn-primary" style="float: right">提交</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">取消</button>
            </form>
        </div>
    </div>
</div>



