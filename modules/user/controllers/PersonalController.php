<?php
/**
 * Created by PhpStorm.
 * User: doudou
 * Date: 2015/5/12
 * Time: 8:31
 */

namespace app\modules\user\controllers;
use app\models\Articles;
use yii\data\Pagination;
class PersonalController extends \yii\web\Controller
{
    public $layout = 'personal_page';
    public $user_id ;
    public function actionIndex($id)
    {
        $this->user_id = $id;
        return $this->render('index');
    }

    public function actionArticles($id)
    {
        $this->user_id = $id;
        if (!\Yii::$app->user->isGuest) {
            //page
            $query = Articles::find()->where(['user_id'=>$id])->orderBy(['change_at'=>SORT_DESC]);
            $pages = new Pagination(['totalCount'=>$query->count()]);
            $pages->pageSize = PERSONAL_ARTICLE_PAGE_SIZE;
            $models = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
            return $this->render('articles', [
                'models' => $models,
                'pages' => $pages,
            ]);
        }
        return $this->redirect(['default/login']);
    }

}