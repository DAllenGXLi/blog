<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$js = 'document.getElementById("back_nav_id_2").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\ArticlesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'thumb_up') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'change_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
