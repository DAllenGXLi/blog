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
use app\models\ThumbUp;
$js = 'document.getElementById("navigation_type_'.NAV_ARTICLE_NUM.'").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);

//回到顶部插件
$this->registerCssFile('css/style.css');
//$this->registerJsFile('js/jquery.min.js.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/script.js',['position'=>\yii\web\View::POS_HEAD]);

?>


<!--//ajax实现点赞功能-->
<script>

    function Ajax_ThumbUp()
    {
        var xmlhttp;
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("thumb_up_num").innerHTML=xmlhttp.responseText;
            }
        };

        <?php if (!\Yii::$app->user->isGuest) { ?>
        xmlhttp.open('GET','<?= Yii::$app->urlManager->createUrl(['user/articles/thumb-up','user_id'=>Yii::$app->user->identity->id,
                'article_id'=>$model->id, 'comment_id'=>0 ]) ?>',true);
        xmlhttp.send();
        <?php }else{ ?>
        alert('您还没有登陆，请先登录');
        <?php } ?>

    }

</script>


<div class="panel panel-info" style="margin-bottom: 40px">
    <div class="panel-heading">

        <!--            头像-->
            <span style="float: left; position: relative; bottom: 4px">
            <img class="head_portrait_36px" height="36px" src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= Users::findOne($model->user_id)->head_portrait ?>"    /></span>
        <!--            文章标题-->
        <h2 class="panel-title article_title"><b><?= Html::encode($model->title) ?></b></h2>
        <!--        文章时间 作者-->
            <span class="comment-detail"
                  style="position: relative; bottom: 15px;"><span style="margin-right: 10px">
                    <a><?=Html::encode( Users::findOne($model->user_id)->username ) ?></a></span>
                <?= Html::encode($model->create_at) ?></span>
    </div>
    <div class="panel-body" style="overflow: hidden;">
         <span class="article">
        <?=  $model->content ?>
             <br />
             </span>
        <div>
            <span class="comment-detail" style="float: left; margin-right: 30px">发表：<?= $model->create_at ?></span>
            <!--          置顶则不输出日期-->
            <?php
            if($model->change_at != KEEP_TOP_DATE)
            {?>

                <span class="comment-detail" style="float: left; margin-right: 30px">修改：<?= $model->change_at ?></span>

            <?php
            }
            ?>
            <span class="comment-detail" style="float: left; margin-right: 30px">浏览：<?= $model->visited_num ?></span>

            <a type="button" class="btn btn-sm btn-info comment-button" data-toggle="modal" data-target=".bs-example-modal-sm" >
                <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 评论</a>

<!--            点赞-->
            <a type="button" class="btn btn-sm btn-success comment-button" onclick="Ajax_ThumbUp()">
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                 <span id="thumb_up_num"><?= Html::encode(ThumbUp::find()->where(['article_id'=>$model->id])->count()) ?></span>
            </a>
        </div>
    </div>
    <!--        百度一键分享-->
    <div style="margin-bottom: 15px; margin-left: 20px">
        <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
        <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    </div>

</div>



<!--//评论表单-->
<!-- Small modal -->
<?php if (!\Yii::$app->user->isGuest) { ?>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form name="comments"  method="post" >
                    <textarea autofocus="autofocus" class="form-control" rows="3" name="content"></textarea>
                    <input type="hidden" name="user_id" value="<?= Yii::$app->user->identity->id ?>" >
                    <input type="hidden" name="target_user_id" value="<?= Users::findOne($model->user_id)->id ?>" >
                    <button type="submit" class="btn btn-primary" style="float: right">提交</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">取消</button>
                </form>
            </div>
        </div>
    </div>
<?php }else{ ?>

<?php } ?>


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
                <?= Html::encode($model->create_at) ?>
            </span>

<!--            评论内容-->
            <?=  Html::encode($_model->content) ?>
        </div>
    </div>


<?php

}

// 显示分页
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>

