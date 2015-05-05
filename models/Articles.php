<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $content
 * @property string $create_at
 * @property string $change_at
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'content', 'create_at', 'change_at'], 'required'],
            [['user_id'], 'integer'],
            [['create_at', 'change_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 9999]
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
            'title' => 'Title',
            'content' => 'Content',
            'create_at' => 'Create At',
            'change_at' => 'Change At',
        ];
    }
}
