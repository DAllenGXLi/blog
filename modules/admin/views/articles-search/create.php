<?php

use yii\helpers\Html;
$js = 'document.getElementById("back_nav_id_2").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);

/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = 'Create Articles';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
