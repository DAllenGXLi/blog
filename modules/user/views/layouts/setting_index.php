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
                <li role="presentation" id="setting_type_1"><a href="#">基本信息</a></li>
                <li role="presentation" id="setting_type_2" ><a href="#">更换头像</a></li>
                <li role="presentation" id="setting_type_3" ><a href="#">更改密码</a></li>
            </ul>



    </div>

<?php $this->endContent(); ?>