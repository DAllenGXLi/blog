<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\CommentsSearch */
/* @var $form yii\widgets\ActiveForm */
$js = 'document.getElementById("back_nav_id_3").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="comments-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'article_id') ?>

    <?= $form->field($model, 'thumb_up') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
