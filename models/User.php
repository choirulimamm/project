<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        
            [['username', 'password'], 'string', 'max' => 50],
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
            'password' => 'Password',
        ];
    }
    public function beforeSave($insert){
        if (parent::beforeSave($insert)){
//            if ($this->isNewRecord){
                $this->password = md5($this->password);
//            }
            return true;
        }
        return false;
    }
    public static function findByUsername($username) {
        $user = self::find()
                ->where([
                    "username" => $username
                ])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static ($user);
    }
    public function validatePassword($password) {
        return $this->password === md5($password);
    }
    
    public static function findIdentity($id){
        $user = self::find()
                ->where([
                    "id" => $id
                ])
                ->one();
        if (!count($user)){
            return null;
        }
        return new static ($user);
    }
    
    public static function findIdentityByAccessToken($token, $userType = null){}
    
    public function getId(){
        return $this->id;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getAuthKey(){}
    
    public function validateAuthKey($authKey){}
    
}
