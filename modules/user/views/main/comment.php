<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/4/25
 * Time: 18:44
 */

$js_navigation = 'document.getElementById("main_comment_nav").setAttribute("class", "active") ';
$this->registerJs($js_navigation, \yii\web\View::POS_READY);

?>
<div class="col-md-9 col-md-offset-1">

<!--    a comment-->
    <div class="media" >
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="/liguoxian.com/res/head/1.png" alt="...">
            </a>
            <span class="label label-success">1234 赞</span>
        </div>
        <div class="media-body">
            <span class="media-heading comment-title">林小豆</span>
            <span class="media-heading comment-detail">2015.4.16</span>
            <p class="comment-text">
            在 Bootstrap 2 中，我们对框架中的某些关键部分增加了对移动设备友好的样式。而在 Bootstrap 3 中，我们重写了整个框架，使其一开始就是对移动设备友好的。这次不是简单的增加一些可选的针对移动设备的样式，而是直接融合进了框架的内核中。
            </p>
<!--           comment button-->
            <button type="button" class="btn btn-danger comment-button">inform</button>
            <button type="button" class="btn btn-default comment-button">collect</button>
            <button type="button" class="btn btn-default comment-button">attention</button>
            <button type="button" class="btn btn-default comment-button">reply</button>
        </div>
    </div>
    <hr class="custom_hr"/>

    <!--    a comment-->
    <div class="media" >
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="/liguoxian.com/res/head/2.png" alt="...">
            </a>
            <span class="label label-success">1234 赞</span>
        </div>
        <div class="media-body">
            <span class="media-heading comment-title">林小豆</span>
            <span class="media-heading comment-detail">2015.4.16</span>
            <p class="comment-text">
                在 Bootstrap 2 中，我们对框架中的某些关键部友好的样式。而在 Bootstrap 3 中，我们重写了整个框架，使其一开始就是对移动设备友好的。这次不是简单的增加一些可选的针对移动设备的样式，而是直接融合进了框架的内核中。
            </p>
            <!--           comment button-->
            <button type="button" class="btn btn-danger comment-button">inform</button>
            <button type="button" class="btn btn-default comment-button">collect</button>
            <button type="button" class="btn btn-default comment-button">attention</button>
            <button type="button" class="btn btn-default comment-button">reply</button>
        </div>
    </div>
    <hr class="custom_hr"/>


</div>