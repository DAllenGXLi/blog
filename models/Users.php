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
    public $verifyCode;
    public $_username;
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
//            ['verifyCode', 'captcha','message'=>'验证码错误'],

            ['username', 'string', 'max' => 20, 'min'=>3, 'tooLong'=>'用户名过长', 'tooShort'=>'用户名过短'],
            ['username','required','message'=>'用户名不能为空'],
            ['username', 'unique', 'targetAttribute' => ['username'], 'message' => '对不起，该用户已被注册'],
            ['_username','required','message'=>'用户名不能为空'],
//            ['username', 'match','pattern'=>'/^([a-zA-Z]|[\u4E00-\u9FA5]){1}([a-zA-Z0-9]|[\u4E00-\u9FA5]|[_]){2,30}$/', 'message'=>'用户名只能包含字母,汉字,数字以及下划线'],

            ['password','required','message'=>'密码不能为空'],
            ['password', 'string', 'min' => 6, 'tooShort'=>'密码过短' ],
//            ['password','match', 'pattern'=>'/^\w+$/','message'=>'密码含有无效字符'],

            ['email', 'unique', 'targetAttribute' => ['email'], 'message' => '对不起，该邮箱已被注册'],
            ['email','required','message'=>'邮箱不能为空'],
            [['email'], 'email', 'message'=>'邮箱格式错误'],

            [['head_portrait', 'auto_key', 'access_token'], 'string', 'max' => 30],
            [['create_at','rememberMe'], 'safe'],
            [['status'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode'=>'验证码',
            'id' => 'ID',
            'username' => '用户名',
            '_username' => '用户名',
            'email' => 'Email',
            'password' => '密码',
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
            'login'=>[ '_username', 'password','rememberMe'],
//            'register'=>['username', 'password','email','verifyCode'],
            'register'=>['username', 'password','email'],
            'default'=>[],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if( !$this->hasErrors() ) {
            $user = Users::findOne(['username'=>$this->_username]);

            if( !$user )
            {
                $this->addError('username', '没有找到该用户!');
                return false;
            }
            else if( !( Yii::$app->getSecurity()->validatePassword($this->password,$user->password)) ) {
                $this->addError('password', '密码错误!');
                return false;
            }
            else {
                return true;
            }
        }
        return true;
    }

    public function login()
    {
        if( !$this->validate() || !$this->validatePassword('password',null) ) {
            return false;
        }
        $user = Users::findOne( [ 'username'=>$this->_username ] );
        return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
    }




    public function register()
    {
        if(!$this->validate())
            return false;
        $this->auto_key = Yii::$app->getSecurity()->generateRandomString();
        if($this->save())
        {
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
            if($this->save()){
                echo '<script>alert("注册成功")</script>';
            }
            else{
                echo '<script>alert("注册失败")</script>';
                return false;
            }
            return true;
        }
        else{
            echo '<script>alert("注册失败")</script>';
            return false;
        }
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
        return $this->auto_key;
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
