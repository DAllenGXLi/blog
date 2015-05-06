<?php
//显示所有文章标题和概要信息

namespace app\modules\user\controllers;

use app\models\Articles;
use yii\data\Pagination;

class ArticlesController extends \yii\web\Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            //page
            $query = Articles::find();
            $pages = new Pagination(['totalCount'=>$query->count()]);
            $pages->pageSize = 4;
            $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
            return $this->render('index', [
                'models' => $models,
                'pages' => $pages,
            ]);
        }
        return $this->redirect(['default/login']);
    }

    public function actionSpecific($id)
    {
        $model = Articles::findOne($id);
        return $this->render('specific',['model'=>$model]);
    }

}
