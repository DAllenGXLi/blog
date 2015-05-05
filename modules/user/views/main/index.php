<?php

var_dump(Yii::$app->user->identity->username);

?>

<a class="btn btn-default" href="<?= Yii::$app->urlManager->createUrl(["user/main/film"]) ?>" role="button">Link</a>