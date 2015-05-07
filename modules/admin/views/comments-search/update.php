<?php

use yii\helpers\Html;
$js = 'document.getElementById("back_nav_id_3").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Update Comments: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
