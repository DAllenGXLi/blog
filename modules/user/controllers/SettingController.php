<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/12
 * Time: 13:50
 */
namespace app\modules\user\controllers;
use yii\web\Controller;

class SettingController extends Controller
{
    public $layout = 'setting_index';
    public function actionIndex()
    {
        $this->layout = false;
        return $this->render('index');
    }
}