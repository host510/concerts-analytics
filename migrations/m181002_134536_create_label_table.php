<?php

use yii\db\Migration;

/**
 * Handles the creation of table `label`.
 */
class m181002_134536_create_label_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('label', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'concert_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('label');
    }
}
