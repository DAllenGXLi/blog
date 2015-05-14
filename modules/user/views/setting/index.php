<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/12
 * Time: 13:51
 */
?>


<?php
//引入全局样式，js文件等，设定背景颜色，框架
use yii\helpers\Html;


$this->registerCssFile('css/bootstrap.min.css');
$this->registerJsFile('js/jquery-1.11.2.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerJsFile('js/bootstrap.min.js',['position'=>\yii\web\View::POS_HEAD]);
$this->registerCssFile('css/main.css');
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>图片上传本地预览</title>
    <style type="text/css">
        #preview{width:300px;height:300px;border:1px solid #000;overflow:hidden;}
        #imghead {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
    </style>
    <script type="text/javascript">


        //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
            var MAXWIDTH  = 600;
            var MAXHEIGHT = 300;
            var div = document.getElementById('preview');
            if (file.files && file.files[0])
            {
                div.innerHTML ='<img id=imghead>';
                var img = document.getElementById('imghead');
                img.onload = function(){
                    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                    img.width  =  rect.width;
                    img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                    img.style.marginTop = rect.top+'px';
                }
                var reader = new FileReader();
                reader.onload = function(evt){img.src = evt.target.result;}
                reader.readAsDataURL(file.files[0]);
            }
            else //兼容IE
            {
                var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
                file.select();
                var src = document.selection.createRange().text;
                div.innerHTML = '<img id=imghead>';
                var img = document.getElementById('imghead');
                img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
                div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
            }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;

                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }

            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
    </script>
</head>

<body style="background-color: rgba(228, 228, 229, 0.89); ">
<?php $this->beginBody() ?>


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
                      <img src="<?=  DOCUMENT_ROOT ?>/res/img/head_portrait/000.jpg" height="42px"  />
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
</div>


<div class="container" style="padding-bottom: 100px; margin-top: 10px; margin-bottom: 20px; background-color: rgba(244, 244, 245, 0.89)" >

    <!--    navigation-->
    <ul class="nav nav-pills nav nav-pills nav-justified head_navigation_2">
        <li role="presentation" id="navigation_type_1"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/main/index"]) ?>">Home</a></li>
        <li role="presentation" id="navigation_type_2"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/articles/index"]) ?>">Article</a></li>
        <li role="presentation" id="navigation_type_3"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/photos/index"]) ?>">Photo</a></li>
        <li role="presentation" id="navigation_type_4"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/message-board/index"]) ?>">MB</a></li>
        <li role="presentation" id="navigation_type_5"><a href="
                <?= Yii::$app->urlManager->createUrl(["user/contact/index"]) ?>">Contact</a></li>
    </ul>

<!--    -->






    <div id="preview">
        <img id="imghead" width=300 height=300 border=0 src='<%=request.getContextPath()%>/images/defaul.jpg'>
    </div>


    <input type="file" onchange="previewImage(this)" />




<!---->
</div>


<?php $this->endBody() ?>
</body>

</html>

<?php $this->endPage() ?>

