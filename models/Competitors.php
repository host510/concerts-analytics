<?php
namespace app\models;

use yii\db\ActiveRecord;

class Competitors extends ActiveRecord
{
	 /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'concerts';
    }
    
	 private static $list = null;
    /**
     * @return array
     */
    public static function getList()
    {
        if (is_null(static::$list)) {
            static::$list = self::find()->asArray()->where(['provider' => '2'])->orderBy('date')->all();
        }
        return static::$list;
    }   
}
?>