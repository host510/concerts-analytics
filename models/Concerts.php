<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Concerts extends ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id', 'tour_id', 'category_id', 'provider'], 'integer'],
            [['name', 'town', 'venue'], 'string', 'max' => 255],
            [['name', 'provider', 'town', 'venue', 'date', 'admin_id', 'tour_id', 'category_id', 'sum', 'tickets', 'time'], 'required'],
        ];
    }

     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название концерта',
            'provider' => 'Организатор концерта',
            'town' => 'Город',
            'venue' => 'Площадка',
            'date' => 'Дата',
            'admin_id' => 'Ответственный администратор',
            'tour_id' => 'Тур',
            'category_id' => 'Жанр',
            'sum' => 'Сумма',
            'ticket' => 'Продано билетов',
            'time' => 'Время концерта'
        ];
    }

    private static $list = null;
    /**
     * @return array
     */
    public static function getList()
    {
        if (is_null(static::$list)) {
            static::$list = self::find()->asArray()->orderBy('date')->all();
        }

        return static::$list;
    }
    
}
?>