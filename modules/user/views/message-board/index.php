

<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use app\models\Users;


$js_navigation = 'document.getElementById("navigation_type_4").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);

$i = 1;
foreach ($models as $model) {
// 在这里显示 $model
    //获取文章作者
    $user_id = $model->user_id;
    $user = Users::findOne($user_id);
    ?>


    <div class="panel panel-info" style="margin-bottom: 0px" xmlns="http://www.w3.org/1999/html">
        <div class="panel-heading">
            <!--            评论作者-->
            <h2 class="panel-title"><b><?= Html::encode($user->username) ?></b></h2>
            <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;">
                <?= Html::encode($model->create_at) ?></span>
<!--            <span class="comment-detail"-->
<!--                style="position: relative; bottom: 15px; right: 20px">第--><?//= $i++ ?><!--楼</span>-->

        </div>
        <div class="panel-body" style="padding-bottom: 0px">
            <span class="article">
            <?=  Html::encode($model->content) ?>
                </span>
            <a type="button" class="btn btn-sm btn-info comment-button">评论</a>
            <a type="button" class="btn btn-sm btn-success comment-button">点赞</a>
        </div>
    </div>



    <br/>


<?php
}
?>




<!--//评论表单-->
<!-- Small modal -->
<div class="row">
<div style="margin-bottom: 20px" class="col-md-offset-5 col-md-2">
<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bs-example-modal-sm">我来说两句</button>
</div>
</div>

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


<div class="row" style="margin-left: 10px">
<?php
// 显示分页
echo LinkPager::widget([
    'pagination' => $pages,
]);

?>
</div>