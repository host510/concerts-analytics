<?php

use yii\db\Migration;

/**
 * Handles the creation of table `concerts`.
 */
class m180926_104403_create_concerts_table extends Migration
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

        $this->addForeignKey(
            'fk-concerts-category_id',
            'concerts',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-concerts-admin_id',
            'concerts',
            'admin_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-concerts-tour_id',
            'concerts',
            'tour_id',
            'tours',
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
            'fk-concerts-category_id',
            'concerts'
        );

        $this->dropForeignKey(
            'fk-concerts-admin_id',
            'concerts'
        );

        $this->dropForeignKey(
            'fk-concerts-tour_id',
            'concerts'
        );

        $this->dropTable('concerts');
    }
}
