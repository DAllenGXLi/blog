<?php

use yii\helpers\Html;

$js = 'document.getElementById("back_nav_id_3").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Create Comments';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
