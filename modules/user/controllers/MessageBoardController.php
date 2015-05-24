<?php

namespace app\modules\user\controllers;

use app\models\Comments;
use yii\data\Pagination;
use Yii;

class MessageBoardController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public $layout = 'main';
    public function actionIndex()
    {
        if (!\Yii::$app->user->isGuest) {



            if( Yii::$app->request->isPost )
                if($_POST['content']!='') {
                    Comments::loadForMB($_POST['user_id'], $_POST['content'],0);
                }

            //评论
            $model = new Comments();
            //page
            $query = Comments::find(['article_id'=>MB_ARTICLE_ID])->where('id>0')->orderBy(['create_at'=>SORT_DESC]);
            $pages = new Pagination(['totalCount'=>$query->count()]);
            $pages->pageSize = MB_PAGE_SIZE;
            $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            return $this->render('index', [
                'models' => $models,
                'pages' => $pages,
                'mb' => $model
            ]);
        }
        return $this->redirect(['default/login']);
    }
}
