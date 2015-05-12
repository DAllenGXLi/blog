<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Users */
$js = 'document.getElementById("back_nav_id_1").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);

$this->title = 'Create Users';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
