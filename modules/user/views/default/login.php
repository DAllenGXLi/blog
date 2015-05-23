<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>


<div class="default-login container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, '_username') ?>
            <?= $form->field($model, 'password') ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('登陆', ['class' => 'btn btn-primary']) ?>
                <a type="button" class="btn btn-success" style="margin-left: 10px" href="
                <?= Yii::$app->urlManager->createUrl(['user/default/register']) ?>">注册</a>
            </div>
            <?php ActiveForm::end(); ?>




        </div>
        </div>
</div><!-- default-login -->
