<?php

use yii\helpers\Html;

$this->registerCssFile('css/main.css');
$this->registerCssFile('css/bootstrap.min.css');
$this->registerJsFile('js/jquery-1.11.2.min.js');
$this->registerJsFile('js/bootstrap.min.js');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body style="background-color: rgba(228, 228, 229, 0.89)">
        <?php $this->beginBody() ?>


          <?= $content ?>


        <?php $this->endBody() ?>
    </body>

</html>

<?php $this->endPage() ?>

