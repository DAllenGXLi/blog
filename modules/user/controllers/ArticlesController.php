<?php
//显示所有文章标题和概要信息

namespace app\modules\user\controllers;

use app\models\Articles;
use yii\data\Pagination;
use Yii;
use app\models\Comments;
use app\models\ThumbUp;

class ArticlesController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;

    public $layout = 'article_index';

    public function actionIndex($class)
    {
        if (!\Yii::$app->user->isGuest) {
            //page
            if( $class == 'ALL' || $class == 'all' )
                $query = Articles::find()->where('id > 0')->orderBy(['change_at'=>SORT_DESC]);
            else{
                $query = Articles::find()->where("class='$class' and id>0")->orderBy(['change_at'=>SORT_DESC]);
            }
            $pages = new Pagination(['totalCount'=>$query->count()]);
            $pages->pageSize = ARTICLE_PAGE_SIZE;
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
        $model->visited_num++;
        $model->save();
            //提交评论
        if( Yii::$app->request->isPost )
            if($_POST['content']!='') {
                Comments::loadForMB($_POST['user_id'], $_POST['content'],$id);
            }

//        查找评论并分页
        $query = Comments::find()->where(['article_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $pages->pageSize=ARTICLE_COMMENTS_PAGE_SIZE;
        return $this->render('specific', [
            'model'=>$model,
            'models' => $models,
            'pages' => $pages,
        ]);
    }

//    ajax调用
    public function actionThumbUp($user_id, $article_id, $comment_id)
    {
        ThumbUp::click($user_id, $article_id, $comment_id);
        $model = Articles::findOne($article_id);
        $model->thumb_up = ThumbUp::find()->where(['article_id'=>$article_id])->count();
        $model->save();
        return $model->thumb_up;
    }


    public function actionWrite()
    {
        $this->layout = false;
        if( Yii::$app->request->isPost )
        {
            if(Articles::loadForArticle($_POST['user_id'], $_POST['title'], $_POST['content'],$_POST['class'])) {
                $this->redirect(['articles/index','class'=>$_POST['class']]);
            }
            else{
                echo '提交失败';
                return false;
//                var_dump('false');
            }
        }
        return $this->render('write');
    }

}
