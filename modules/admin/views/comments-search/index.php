<?php

use yii\helpers\Html;
use yii\grid\GridView;
$js = 'document.getElementById("back_nav_id_3").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'article_id',
            'thumb_up',
            'content',
            'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
