<?php
//引入全局样式，js文件等，设定背景颜色，框架,此page不使用layout
use yii\helpers\Html;


$this->registerCssFile('css/bootstrap.min.css');
$this->registerJsFile('js/jquery-1.11.2.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/bootstrap.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('UM/umeditor.config.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('UM/umeditor.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerCssFile('UM/themes/default/css/umeditor.css');
$this->registerCssFile('css/main.css');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body style="background-color: rgba(228, 228, 229, 0.89); ">
<?php $this->beginBody() ?>


<?php
//基础导航及logo
?>
<?php
$this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>
<div id="div_main">


    <!--   top-->
    <div class="nav_head">
        <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

            <div class="row">
                <span>doudou's home</span>

                <!--                    如果已登陆，显示用户信息-->
                <?php
                if( !Yii::$app->user->identity==null ) {
                ?>

                <span class="dropdown nav_user" style="float: right">
<!--                          用户信息-->
                        <a class=" dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                            <span>
                      <img src="<?=  HEAD_PORTRAIT_ROOT ?>/000.jpg" height="42px"  />
                                <?=Yii::$app->user->identity->username?></span>

                        </a>
                          <!--                  下拉菜单    -->
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1" >
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 个人主页</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 我的动态</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/setting/index']) ?>">
                                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 账户设置</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">
                                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span> 我的收藏</a></li>
                            <li role="presentation" class="divider" style="background-color: rgba(93, 93, 94, 0.89)"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="
                            <?= Yii::$app->urlManager->createUrl(['user/default/logout']) ?>">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出登录</a></li>
                        </ul>
            </div>

            <?php } ?>



        </div><!-- /.row -->
    </div>
</div>


<div class="container" style="padding-bottom: 100px; margin-top: 10px; margin-bottom: 20px; background-color: rgba(244, 244, 245, 0.89)" >


    <!--    navigation-->
    <ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
        <li role="presentation" id="navigation_type_<?= NAV_HOME_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">主页</a></li>
        <li role="presentation" id="navigation_type_<?= NAV_ARTICLE_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/articles/index",'type'=>ARTICLE_TYPE_ALL]) ?>">文章</a></li>
        <li role="presentation" id="navigation_type_<?= NAV_MUSIC_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/music/index"]) ?>">音乐</a></li>
        <li role="presentation" id="navigation_type_<?= NAV_PHOTO_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">照片</a></li>
        <li role="presentation" id="navigation_type_<?= NAV_MB_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">留言板</a></li>
        <li role="presentation" id="navigation_type_<?= NAV_CONTACT_NUM ?>"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/contact/index"]) ?>">联系我</a></li>
    </ul>

    <!--    文章种类-->
    <select id="article_type" style="float:right; height: 33px; width: 120px " name="cars">
        <optgroup label="Swedish Cars">
            <option selected="selected" value="<?= ARTICLE_TYPE_DOUDOU ?>">doudou博文</option>
            <option value="1">Volvo</option>
            <option value="2">Saab</option>
        </optgroup>
        <optgroup label="German Cars">
            <option value="3">Mercedes</option>
            <option value="4">Audi</option>
        </optgroup>
    </select>


<!--    title-->
    <div class="input-group">
        <span class="input-group-addon" id="basic-addon1"><b>标题</b></span>
        <input type="text" id="article_title" class="form-control" placeholder="请输入你的标题" aria-describedby="basic-addon1">
    </div>



<!--    富文本编辑器-->

    <!--style给定宽度可以影响编辑器的最终宽度-->
    <script type="text/plain" id="myEditor" style="width:100%; height:240px;"></script>
    <div class="clear"></div>

    <script type="text/javascript">
        //实例化编辑器
        var um = UM.getEditor('myEditor');

        //创建虚拟表单并提交
        function articleSubmit() {


            var form = document.createElement("form");
            document.body.appendChild(form);
            form.method = 'post';
            //内容
            var content = document.createElement('input');
            content.value = UM.getEditor('myEditor').getContent();
            content.name = 'content';
            content.type = 'hidden';

            //标题
            var title = document.createElement('input');
            title.value = document.getElementById('article_title').value ;
            if (title.value.length > <?= ARTICLE_TITLE_MAX_NUM ?>)
            {
                alert('标题太长啦，改短一点吧');
                return;
            }
            title.name = 'title';
            title.type = 'hidden';

            //user id
            var user_id = document.createElement('input');
            user_id.value = '<?= Yii::$app->user->identity->id ?>' ;
            user_id.name = 'user_id';
            user_id.type = 'hidden';

            //type
            var type = document.createElement('input');
            type.value = document.getElementById('article_type').value ;
            type.name = 'type';
            type.type = 'hidden';

            //标题
            form.appendChild(content);
            form.appendChild(title);
            form.appendChild(user_id);
            form.appendChild(type);

            if(title.value=='' && content.value=='') {
                alert('标题或者内容不能为空!');
                return ;
            }
            else if( content.value.length <= <?= ARTICLE_MIN_NUM ?> ) {
                alert('内容太少啦，再写多一点吧');
                return ;
            }
            form.submit();
        }

    </script>

<!--    富文本编辑器结束-->

    <!-- Standard button -->
    <button type="button" class="btn btn-default" onclick="articleSubmit()">提交</button>
</div>



<?php $this->endContent(); ?>


<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>

