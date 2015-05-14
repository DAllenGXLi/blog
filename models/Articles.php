<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property integer $user_id
 * 		* @property integer $thumb_up
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
            [['user_id', 'thumb_up', 'title', 'content', 'create_at', 'change_at'], 'required'],
            [['user_id', 'thumb_up'], 'integer'],
            [['create_at', 'change_at'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 99999]
        ];
    }

    public function scenarios()
    {
        return [
            'write'=>['content','user_id','title','create_at'],
            'default'=>[]
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
            'thumb_up' => 'Thumb Up',
            'title' => 'Title',
            'content' => 'Content',
            'create_at' => 'Create At',
            'change_at' => 'Change At',
        ];
    }

    public static function loadForArticle($user_id, $title, $content)
    {
        date_default_timezone_set("Etc/GMT+8");
        $model = new Articles();
        $model->setScenario('write');
        $model->user_id = $user_id;
        $model->content = $content;
        $model->title = $title;
        $model->create_at = date('Y-m-d H:i:s',time());
        $model->change_at = date('Y-m-d H:i:s',time());
        if($model->validate())
        {
            if($model->save())
            {
                return true;
            }
        }
        return false;
    }

}
