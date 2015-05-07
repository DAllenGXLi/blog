<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/6
 * Time: 18:56
 */

$this->beginContent('@app/modules/user/views/layouts/main.php'); ?>





<div class="row">

    <div class="col-md-9">
<?= $content ?>
    </div>

    <div class="col-md-3">
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" id="article_type_1"><a href="#">Cocos2d-x专区</a></li>
        <li role="presentation" id="article_type_2" ><a href="#">Cocosd-js专区</a></li>
        <li role="presentation" id="article_type_3" ><a href="#">Unity5 专区</a></li>
        <li role="presentation" id="article_type_4" ><a href="#">社会热点专区</a></li>
        <li role="presentation" id="article_type_5" ><a href="#">泡妞把妹专区</a></li>
        <li role="presentation" id="article_type_6" ><a href="#">吐槽专区</a></li>
    </ul>
    </div>

    </div>

<?php $this->endContent(); ?>