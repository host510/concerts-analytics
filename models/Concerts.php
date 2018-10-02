<?php
namespace app\models;

use yii\db\ActiveRecord;

class Concerts extends ActiveRecord
{
	 /**
     * @inheritdoc
     */
    // public function rules()
    // {
    //     return [
    //         [['admin_id', 'tour_id', 'category_id'], 'integer'],
    //         [['date'], 'safe'],
    //         [['name', 'provider', 'town', 'venue'], 'string', 'max' => 255],
    //         [['name', 'provider', 'town', 'venue', 'date', 'admin_id', 'tour_id', 'category_id', 'sum', 'tickets', 'time'], 'required'],
    //     ];
    // }
}
?>