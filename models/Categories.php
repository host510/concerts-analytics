<?php

namespace app\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название жанра',
        ];
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


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParameters()
    {
        return $this->hasMany(Parameter::className(), ['category_id' => 'id']);
    }
}
