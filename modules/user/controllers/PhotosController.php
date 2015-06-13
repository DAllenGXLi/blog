<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/4
 * Time: 21:11
 */
namespace app\modules\user\controllers;

class PhotosController extends \yii\web\Controller
{
    public $layout = 'basic';
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        return $this->redirect(['default/login']);
    }

}
