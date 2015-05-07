<?php

namespace app\modules\user\controllers;

use app\models\Comments;
use yii\data\Pagination;

class MessageBoardController extends \yii\web\Controller
{
    public $layout = 'main';
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {
            //page
            $query = Comments::find(['article_id'=>MB_ARTICLE_ID]);
            $pages = new Pagination(['totalCount'=>$query->count()]);
            $pages->pageSize = MB_PAGE_SIZE;
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
}
