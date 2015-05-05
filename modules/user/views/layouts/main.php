
<?php $this->beginContent('@app/modules/user/views/layouts/basic.php'); ?>
    <div id="div_main">


        <!--   top-->
        <div style="background-color: #3c3c3c; height: 50px">
            <div class="container" style="color: #e3e3e3; font-weight: bolder; font-size: 35px">

                <div class="row">
                    <div class="col-md-8 col-xs-6">
                        <span>doudou's home</span>
                    </div><!-- /.col-lg-6 -->
                    <div class="col-md-4 col-xs-6" style="margin-top:8px;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>
        </div>



        <div class="container" style="margin-top: 10px; margin-bottom: 20px;">
        <!--    navigation-->
            <ul class="nav nav-pills nav nav-pills nav-justified">
                <li role="presentation" class="active"><a href="#">Home</a></li>
                <li role="presentation"><a href="#">Article</a></li>
                <li role="presentation"><a href="#">Photo</a></li>
                <li role="presentation"><a href="#">Message</a></li>
                <li role="presentation"><a href="#">Contact</a></li>
            </ul>

            <?= $content ?>

        </div>

    </div>
<?php $this->endContent(); ?>