<?php

namespace app\modules\user\controllers;

use yii\web\Controller;
use Yii;
use app\models\Users;
class DefaultController extends Controller
{
    public $layout = 'default';

    public function actionLogin()
    {


        if (!\Yii::$app->user->isGuest) {
//            return $this->redirect(['user/main/index']);
        }

        $model = new Users();
        $model->setScenario('login');
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
        var_dump("hello allen");
        Yii::$app->user->logout();
//        return $this->redirect(['/user/main/index']);
    }


}
