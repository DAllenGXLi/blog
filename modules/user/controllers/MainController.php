<?php

namespace app\modules\user\controllers;
use app\models\User;
use app\models\Users;
use app\models\Articles;
class MainController extends \yii\web\Controller
{
    public $layout = 'first';

    //article
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
//            $models = Articles::find()->where('id > 0')->orderBy(['thumb_up'=>SORT_DESC])->;
        $models = Articles::findBySql('SELECT * FROM articles WHERE id>0 ORDER BY visited_num DESC LIMIT 5')->all();

            return $this->render('index',['models'=>$models]);
        }
        else{
            return $this->redirect(['default/login']);
        }

    }

    public function actionMusic()
    {
        if (!\Yii::$app->user->isGuest) {
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

    public function actionComment()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('comment');
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
