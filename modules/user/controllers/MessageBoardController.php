<?php

namespace app\modules\user\controllers;

class MessageBoardController extends \yii\web\Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
