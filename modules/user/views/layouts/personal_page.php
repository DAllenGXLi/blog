<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/16
 * Time: 13:51
 */
use app\models\Users;
$user = Users::findOne($this->context->user_id);
$this->beginContent('@app/modules/user/views/layouts/main.php'); ?>


<div class="row">



<!--  personal左侧导航&个人主要资料-->
    <div class="col-md-3">
<!--        资料-->
        <div class="row">
                <div class="thumbnail">
                    <img src="<?=  HEAD_PORTRAIT_ROOT ?>/<?= $user->head_portrait ?>" style=" height: 128px; width: 128px" alt="...">
                </div>
             </div>

<!--        导航-->
        <ul class="nav nav-pills nav-stacked" >
            <li role="presentation" id="personal_nav_articles"><a href="
            <?= Yii::$app->urlManager->createUrl(['user/personal/articles','id'=>$user->id]) ?>">文章</a></li>
            <li role="presentation"><a href="#">评论</a></li>
        </ul>
    </div>

<!--    具体信息栏-->
    <div class="col-md-9">
    <?= $content ?>
        </div>

</div>


<?php $this->endContent(); ?>