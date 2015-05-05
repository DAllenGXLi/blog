<?php
?>
<?php
$this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>
    <div id="div_main">


        <!--   top-->
        <div style="background-color: #3c3c3c; height: 50px">
            <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

                <div class="row">
                        <span>doudou's home</span>

                  <?php
                  if( !Yii::$app->user->identity==null ) {
                      echo '
                            <span style="float: right"><a href="'. Yii::$app->urlManager->createUrl(["user/default/logout"]) .'">'.Yii::$app->user->identity->username.'</a></span>
                    ';
                  }
                  ?>

                </div><!-- /.row -->
            </div>
        </div>
    </div>


        <div class="container" style="margin-top: 10px; margin-bottom: 20px; background-color: rgba(244, 244, 245, 0.89)" >


            <?= $content ?>

        </div>


<?php $this->endContent(); ?>