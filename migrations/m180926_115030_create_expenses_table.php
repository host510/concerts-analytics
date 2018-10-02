<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expenses`.
 */
class m180926_115030_create_expenses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('expenses', [
            'id' => $this->primaryKey(),
            'sum' => $this->decimal(14, 2),
            'purpose' => $this->string(255),
            'date' => $this->dateTime()->defaultValue(['expression'=>'CURRENT_TIMESTAMP']),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('expenses');
    }
}
