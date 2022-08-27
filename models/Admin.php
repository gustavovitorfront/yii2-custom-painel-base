<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string|null $nome
 * @property string $email
 * @property string $senha
 * @property int|null $permissao
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'senha'], 'required'],
            [['permissao'], 'integer'],
            [['nome', 'senha'], 'string', 'max' => 100],
            [['email', 'authKey'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
            'permissao' => 'Permissao',
            'authKey' => 'Auth Key'
        ];
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getId()
    {
        return $this->id;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    public static function findByEmail($email){
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($password){
        return Yii::$app->getSecurity()->validatePassword($password, $this->senha);
    }
}
