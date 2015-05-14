<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/13
 * Time: 14:48
 */

$js = 'document.getElementById("navigation_type_'.NAV_MUSIC_NUM.'").setAttribute("class", "active") ';
$this->registerJs($js, \yii\web\View::POS_READY);
?>

<div class="jumbotron">
    <h1>此页正在玩命开发中！...</h1>
    <!--    <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
</div>