<?php

use yii\db\Migration;

/**
 * Handles the creation of table `categories`.
 */
class m180926_123602_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('categories', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('categories');
    }
}
