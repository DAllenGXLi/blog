<?php

namespace app\modules\user\controllers;
use app\models\User;
use app\models\Users;

class MainController extends \yii\web\Controller
{
    public $layout = 'first';

    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }
        else{
            return $this->redirect(['default/login']);
        }

    }

    public function actionMusic()
    {
        if (!\Yii::$app->user->isGuest) {

            $model = new Users();
            $model->email='11';
            $model->username="11";
            $model->password='11';
            $model->head_portrait='11';
            var_dump($model->save());


            return $this->render('music');
        }
        else{
            return $this->redirect(['default/login']);
        }
    }

    public function actionFilm()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('film');
        }
        else{
            return $this->redirect(['default/login']);
        }
    }

    public function actionGame()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('game');
        }
        else{
            return $this->redirect(['default/login']);
        }
    }


}
