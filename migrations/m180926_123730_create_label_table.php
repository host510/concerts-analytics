<?php

use yii\db\Migration;

/**
 * Handles the creation of table `label`.
 */
class m180926_123730_create_label_table extends Migration
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

        $this->addForeignKey(
            'fk-label-user_id',
            'label',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-label-concert_id',
            'label',
            'concert_id',
            'concerts',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropForeignKey(
            'fk-label-user_id',
            'label'
        );

         $this->dropForeignKey(
            'fk-label-concert_id',
            'label'
        );

        $this->dropTable('label');
    }
}
