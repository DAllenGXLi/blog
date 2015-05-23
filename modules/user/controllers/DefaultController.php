<?php

namespace app\modules\user\controllers;

use backend\models\UserSearch;
use yii\web\Controller;
use Yii;
use app\models\Users;
class DefaultController extends Controller
{
    public $layout = 'main';

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLogin()
    {


        if (!\Yii::$app->user->isGuest) {
            return $this->redirect(['main/index']);
        }

        $model = new Users();
        $model->setScenario('login');
        $model->load(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['main/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['default/login']);
    }

    public function actionRegister()
    {
        $model = new Users();
        $model->setScenario('register');
        if( $model->load(Yii::$app->request->post()) && $model->register() )
        {
            var_dump('aaa');
            return $this->redirect(['default/login']);
        }
        return $this->render('register',['model'=>$model]);
    }


}
