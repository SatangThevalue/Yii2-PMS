<?php

use yii\db\Migration;

class m230426_124551_create_table_user extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user}}',
            [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull(),
                'fname' => $this->string(100)->defaultValue('Your fullname'),
                'lname' => $this->string(100)->defaultValue('Your lastname'),
                'tel_no' => $this->string(50),
                'role' => $this->integer(2)->notNull()->defaultValue('1'),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string()->notNull(),
                'password_reset_token' => $this->string(),
                'email' => $this->string()->notNull(),
                'status' => $this->smallInteger()->notNull()->defaultValue('10'),
                'isActive' => $this->integer(1)->notNull()->defaultValue('1'),
                'created_by_user_id' => $this->integer()->notNull()->defaultValue('1'),
                'updated_by_user_id' => $this->integer()->notNull()->defaultValue('1'),
                'created_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'verification_token' => $this->string(),
            ],
            $tableOptions
        );

        $this->createIndex('email', '{{%user}}', ['email'], true);
        $this->createIndex('fk_user_created_by_user_id', '{{%user}}', ['created_by_user_id']);
        $this->createIndex('username', '{{%user}}', ['username'], true);
        $this->createIndex('password_reset_token', '{{%user}}', ['password_reset_token'], true);
        $this->createIndex('fk_user_updated_by_user_id', '{{%user}}', ['updated_by_user_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
