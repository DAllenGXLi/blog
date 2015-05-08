<?php
//引入全局样式，js文件等，设定背景颜色，框架
use yii\helpers\Html;


$this->registerCssFile('css/bootstrap.min.css');
$this->registerJsFile('js/jquery-1.11.2.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/bootstrap.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('UM/umeditor.config.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('UM/umeditor.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerCssFile('UM/themes/default/css/umeditor.css');
$this->registerCssFile('css/main.css');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body style="background-color: rgba(228, 228, 229, 0.89); ">
<?php $this->beginBody() ?>


<?php
//基础导航及logo
?>
<?php
$this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>
<div id="div_main">


    <!--   top-->
    <div style="background-color: #3c3c3c; height: 50px">
        <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

            <div class="row">
                <span>doudou's home</span>

                <?php
                if( !Yii::$app->user->identity==null ) {
                    echo '
                            <span style="float: right"><a href="'. Yii::$app->urlManager->createUrl(["user/default/logout"]) .'">'.Yii::$app->user->identity->username.'</a></span>
                    ';
                }
                ?>

            </div><!-- /.row -->
        </div>
    </div>
</div>


<div class="container" style="padding-bottom: 100px; margin-top: 10px; margin-bottom: 20px; background-color: rgba(244, 244, 245, 0.89)" >

    <!--    navigation-->
    <ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
        <li role="presentation" id="navigation_type_1"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
        <li role="presentation" id="navigation_type_2"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
        <li role="presentation" id="navigation_type_3"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
        <li role="presentation" id="navigation_type_4"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
        <li role="presentation" id="navigation_type_5"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/contact/index"]) ?>">Contact</a></li>
    </ul>


<!--    富文本编辑器-->

    <!--style给定宽度可以影响编辑器的最终宽度-->
    <script type="text/plain" id="myEditor" style="width:1000px;height:240px;">
    <p>这里我可以写一些输入提示</p>
</script>


    <div class="clear"></div>

    <script type="text/javascript">
        //实例化编辑器
        var um = UM.getEditor('myEditor');

        

    </script>

<!--    富文本编辑器结束-->
</div>


<?php $this->endContent(); ?>


<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>

