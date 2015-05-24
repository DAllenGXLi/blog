<?php
//基础导航及logo
?>
<?php
$this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>




            <!--    navigation-->
            <ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
                <li role="presentation" id="navigation_type_<?= NAV_HOME_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">主页</a></li>
                <li role="presentation" id="navigation_type_<?= NAV_ARTICLE_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/articles/index",'class'=>'ALL']) ?>">文章</a></li>
                <li role="presentation" id="navigation_type_<?= NAV_MUSIC_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/music/index"]) ?>">音乐</a></li>
                <li role="presentation" id="navigation_type_<?= NAV_PHOTO_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">照片</a></li>
                <li role="presentation" id="navigation_type_<?= NAV_MB_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">留言板</a></li>
                <li role="presentation" id="navigation_type_<?= NAV_CONTACT_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/contact/index"]) ?>">联系我</a></li>
            </ul>

            <?= $content ?>



<?php $this->endContent(); ?>