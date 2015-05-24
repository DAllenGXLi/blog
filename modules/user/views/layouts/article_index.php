<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/6
 * Time: 18:56
 */
require_once(__DIR__.'/../../../../config/article_info.php');
$this->beginContent('@app/modules/user/views/layouts/main.php'); ?>





<div class="row">

    <div class="col-md-9">
<?= $content ?>
    </div>

    <div class="col-md-3">


<!--边侧菜单-->
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


<!---->
            <?php
                foreach( $_ARTICLE_INFO as $articles )
                {?>

                    <div class="panel panel-success">
                <div class="panel-heading" role="tab" id="heading_<?= $articles[0] ?>">
                    <h4 class="panel-title">
                        <a  data-toggle="collapse"  data-parent="#accordion" href="#collapse_<?= $articles[0] ?>" aria-expanded="false" aria-controls="collapseOne">
                    <?= $articles[0] ?>
                        </a>
                    </h4>
                </div>
                <div id="collapse_<?= $articles[0] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_<?= $articles[0] ?>">
                    <div class="panel-body">

                        <ul class="nav nav-stacked">
                        <?php
                        foreach( $articles[1] as $article )
                        {?>

                            <!--                        内导航-->
                            <li role="presentation"><a href="
                            <?= Yii::$app->urlManager->createUrl(["user/articles/index",'class'=> "$article" ]) ?>"><?= $article ?></a></li>
                        <!--                        -->

                        <?php }
                        ?>
                        </ul>


                    </div>
                </div>
            </div>

              <?php  }
//            ?>

        </div>
<!---->



        <a class="btn btn-danger btn-lg btn-block" style="margin-top: 30px" href="
        <?= Yii::$app->urlManager->createUrl(["user/articles/write"]) ?>" role="button">发表文章</a>
    </div>

    </div>



<?php $this->endContent(); ?>