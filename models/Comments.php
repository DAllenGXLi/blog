<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $article_id
 * @property string $content
 * @property string $create_at
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'article_id', 'content', 'create_at'], 'required'],
            [['user_id', 'article_id'], 'integer'],
            [['create_at'], 'safe'],
            [['content'], 'string', 'max' => 300]
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
            'content' => 'Content',
            'create_at' => 'Create At',
        ];
    }

    //留言板
    public static function loadForMB($user_id, $content)
    {
        date_default_timezone_set("Etc/GMT+8");
        $model = new Comments();
        $model->article_id = 0;
        $model->content = $content;
        $model->user_id = $user_id;
        $model->create_at = date('Y-m-d H:i:s',time());
        $model->save();
    }
}
