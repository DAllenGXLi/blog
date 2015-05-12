<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $head_portrait
 * @property string $password
 * @property string $create_at
 * @property integer $status
 * @property string $auto_key
 * @property string $access_token
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $rememberMe;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'create_at', 'status'], 'required'],
            [['create_at'], 'safe'],
            [['status'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 40],
            [['password'], 'string', 'max' => 64],
            [['head_portrait', 'auto_key', 'access_token'], 'string', 'max' => 30],
            [['username', 'email'], 'unique', 'targetAttribute' => ['username', 'email'], 'message' => 'The combination of Username and Email has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'create_at' => 'Create At',
            'head_portrait' => 'Head Portrait',
            'status' => 'Status',
            'auto_key' => 'Auto Key',
            'access_token' => 'Access Token',
        ];
    }




    public function scenarios()
    {
        return [
            'login'=>[ 'username', 'password'],
            'register'=>['username', 'password','email'],
            'default'=>[],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if( !$this->hasErrors() ) {
            $user = Users::findOne(['username'=>$this->username]);

            if( !$user || !($this->password === $user->password) ) {

                $this->addError($attribute, 'Incorrect password or mail!');
                return false;
            }

        }
        return true;
    }

    public function login()
    {
        if( !$this->validate() || !$this->validatePassword('password',null) )
            return false;
        $user = Users::findOne( [ 'username'=>$this->username ] );
        if( $user==null )
        {
            return false;
        }
        if( $user->password != $this->password )
        {
            return false;
        }

        return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
    }




    public function register()
    {
        if(!$this->validate())
            return false;
        $this->save();
        return true;
    }





    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }



}
