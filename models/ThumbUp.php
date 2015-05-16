<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thumb_up".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $article_id
 * @property integer $comment_id
 *
 * @property Comments $comment
 * @property Articles $article
 */
class ThumbUp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'thumb_up';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'article_id', 'comment_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'article_id' => 'Article ID',
            'comment_id' => 'Comment ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComment()
    {
        return $this->hasOne(Comments::className(), ['id' => 'comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }

    public static function check($user_id, $article_id, $comment_id)
    {
        return (ThumbUp::findOne(['user_id'=>$user_id, 'article_id'=> $article_id, 'comment_id'=>$comment_id])==null) ? false : true;
    }

    public static function click($user_id, $article_id, $comment_id)
    {
        $model = ThumbUp::findOne(['user_id'=>$user_id, 'article_id'=> $article_id, 'comment_id'=>$comment_id]);
        //判断有没有点赞，如果有则取消，如果没有则点赞
        if( $model == null )
        {
            $model = new ThumbUp();
            $model->user_id = $user_id;
            $model->article_id = $article_id;
            $model->comment_id = $comment_id;
            $model->save();
        }
        else{
            $model->delete();
        }
    }


}
