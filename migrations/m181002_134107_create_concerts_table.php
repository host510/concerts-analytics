<?php

use yii\db\Migration;

/**
 * Handles the creation of table `concerts`.
 */
class m181002_134107_create_concerts_table extends Migration
{
    /** 
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('concerts', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'provider' => $this->integer(),
            'town' => $this->string(255),
            'venue' => $this->string(255),
            'category_id' => $this->integer(),
            'admin_id' => $this->integer(),
            'tour_id' => $this->integer(),
            'sum' => $this->decimal(14, 2),
            'tickets' => $this->integer(),
            'time' => $this->dateTime(),
            'date' => $this->dateTime(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('concerts');
    }
}
