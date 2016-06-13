<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utilizadores".
 *
 * @property integer $id
 * @property string $primeiro_nome
 * @property string $ultimo_nome
 * @property integer $Departamento
 * @property string $email
 * @property string $username
 * @property string $password
 */
class Utilizadores extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface    
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utilizadores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['primeiro_nome', 'ultimo_nome', 'Departamento', 'email', 'username', 'password'], 'required'],
            [['Departamento'], 'integer'],
            [['primeiro_nome', 'ultimo_nome', 'email', 'username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'primeiro_nome' => 'Primeiro Nome',
            'ultimo_nome' => 'Ultimo Nome',
            'Departamento' => 'Departamento',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
        ];
    } 

    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        throw new \yii\base\NotSupportedException();
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }
    
    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }
    
    public function validatePassword($password){
        return $this->password === $password;
    }
}