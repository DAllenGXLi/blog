<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "information".
 *
 * @property integer $id
 * @property integer $target_user_id
 * @property integer $origin_user_id
 * @property integer $type
 * @property integer $article_id
 * @property integer $comment_id
 * @property integer $info
 *
 * @property Comments $comment
 * @property Users $targetUser
 * @property Users $originUser
 * @property Articles $article
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['target_user_id', 'origin_user_id', 'type', 'article_id', 'comment_id'], 'required'],
            [['target_user_id', 'origin_user_id', 'type', 'article_id', 'comment_id', 'info'], 'integer'],
            [['comment_id'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'target_user_id' => 'Target User ID',
            'origin_user_id' => 'Origin User ID',
            'type' => 'Type',
            'article_id' => 'Article ID',
            'comment_id' => 'Comment ID',
            'info' => 'Info',
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
    public function getTargetUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'target_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOriginUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'origin_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }

    public static function SaveInformation($target_user_id,$origin_user_id,$type,$article_id,$comment_id)
    {
//        不允许自己向自己发送信息
//        if($target_user_id==$origin_user_id)
//            return;
        $model = new Information();
        $model->target_user_id = $target_user_id;
        $model->origin_user_id = $origin_user_id;
        $model->type = $type;
        $model->article_id = $article_id;
        $model->comment_id = $comment_id;


        $model->save();
    }
}
