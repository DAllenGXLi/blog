<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/6
 * Time: 19:48
 */

namespace app\modules\user\controllers;

class ContactController extends \yii\web\Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        return $this->render('index');
    }

}
