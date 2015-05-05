<?php

namespace app\modules\user\controllers;

class MainController extends \yii\web\Controller
{
    public $layout = 'main';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMusic()
    {
        return $this->render('music');
    }

    public function actionFilm()
    {
        return $this->render('film');
    }

    public function actionGame()
    {
        return $this->render('game');
    }


}
