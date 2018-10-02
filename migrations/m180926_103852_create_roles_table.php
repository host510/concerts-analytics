<?php

use yii\db\Migration;

/**
 * Handles the creation of table `roles`.
 */
class m180926_103852_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('roles', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ]);

        $this->insert('roles', [
            'name' => 'Администратор',
        ]);

        $this->insert('roles', [
            'name' => 'Работник',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('roles');
    }
}
