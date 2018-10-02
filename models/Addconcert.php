<?php
namespace app\models;

use yii\db\ActiveRecord;

class Addconcert extends ActiveRecord
{
	  /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concerts';
    }

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


}
?>