<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>


<div class="default-login container">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password') ?>
            <?= $form->field($model, 'email') ?>

<!--             $form->field($model, 'verifyCode')->widget(Captcha::className(), [-->
<!--//                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-3">{input}</div></div>',-->
<!--//            ])-->



            <div class="form-group">
                <?= Html::submitButton('注册', ['class' => 'btn btn-primary']) ?>

                <a type="button" class="btn btn-success" style="margin-left: 10px" href="
                <?= Yii::$app->urlManager->createUrl(['user/default/login']) ?>">登陆</a>
            </div>

            <?php ActiveForm::end(); ?>



        </div>
    </div>
</div><!-- default-registers -->
