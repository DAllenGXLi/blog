<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/13
 * Time: 14:46
 */


namespace app\modules\user\controllers;

class MusicController extends \yii\web\Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
