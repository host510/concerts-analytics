<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tours`.
 */
class m180926_122626_create_tours_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('tours', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'start' => $this->dateTime(),
            'finish' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('tours');
    }
}
