<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $password
 * @property int $role_id
 */

class Users extends \yii\db\ActiveRecord
{
    const USER_ROLE_ADMIN = 1;
    const USER_ROLE_WORKER = 2;
    public $new_password;
    public $username;
    
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
            [['name', 'password', 'login'], 'required'],
            [['login'], 'email'],
            [['login'], 'unique'],
            [['role_id'], 'integer'],
            [['name', 'login', 'password', 'new_password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'login' => 'Логин',
            'password' => 'Пароль',
            'role_id' => 'Должность',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->password = md5($this->password);
        }

        if ($this->new_password != null) {
            $this->password = md5($this->new_password);
        }
        return parent::beforeSave($insert);
    }

    public function getRoleList()
    {
        return ArrayHelper::map([
            ['id' => self::USER_ROLE_ADMIN, 'name' => 'Администратор',],
            ['id' => self::USER_ROLE_WORKER, 'name' => 'Работник'],
        ], 'id', 'name');
    }

    public function getRoleDescription()
    {
        if($this->role_id == self::USER_ROLE_ADMIN) return 'Администратор';
        if($this->role_id == self::USER_ROLE_WORKER) return 'Работник';
    }

    private static $list = null;
    /**
     * @return array
     */
    public static function getList()
    {
        if (is_null(static::$list)) {
            static::$list = ArrayHelper::map(
                self::find()
                    ->orderBy('name')->all(),
                'id', 'name'
            );
        }

        return static::$list;
    }


}
