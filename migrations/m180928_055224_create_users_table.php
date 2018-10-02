<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m180928_055224_create_users_table extends Migration
{
   /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'login' => $this->string(255),
            'password' => $this->string(255),
            'role_id' => $this->integer()
        ]);

        $this->insert('users', [
            'name' => 'Иванов Иван Иванович',
            'login' => 'admin',
            'password' => md5('admin'),
            'role_id' => 1 // Администратор
        ]);

        $this->insert('users', [
            'name' => 'Петров Петр Петрович',
            'login' => 'worker',
            'password' => md5('worker'),
            'role_id' => 2 // Работник
        ]);

        $this->addForeignKey(
            'fk-users-role_id',
            'users',
            'role_id',
            'roles',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
