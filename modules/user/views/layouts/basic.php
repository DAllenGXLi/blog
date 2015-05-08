<?php
//引入全局样式，js文件等，设定背景颜色，框架
use yii\helpers\Html;


$this->registerCssFile('css/bootstrap.min.css');
$this->registerJsFile('js/jquery-1.11.2.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/bootstrap.min.js',['position'=>\yii\web\View::POS_HEAD]);
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


          <?= $content ?>


        <?php $this->endBody() ?>
    </body>

</html>

<?php $this->endPage() ?>

