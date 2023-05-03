<?php

use yii\db\Migration;

class m230426_070931_create_table_user extends Migration
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
        //default password = 123456
        $this->insert('user', array(
            'id' => 1,
            'username' => 'admin',
            'fname' => 'ผู้พัฒนา',
            'lname' => 'ระดับสูงสุด',
            'tel_no' => '0875548754',
            'auth_key' => 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbA_i',
            'password_hash' => '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS',
            'password_reset_token' => null,
            'email' => 'dev.default@example.com',
            'role' => 0,
            'status' => 10,

        ));

        //default password = 123456
        $this->insert('user', array(
            //'id' => 2,
            'username' => 'user01',
            'fname' => 'ผู้ใช้งาน01',
            'lname' => 'ทดสอบ01',
            'tel_no' => '0867542168',
            'auth_key' => 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbI_b',
            'password_hash' => '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS',
            'password_reset_token' => null,
            'email' => 'user01.default@example.com',
            'role' => 1,
            'status' => 10,

        ));

        //default password = 123456
        $this->insert('user', array(
            //'id' => 2,
            'username' => 'user02',
            'fname' => 'ผู้ใช้งาน02',
            'lname' => 'ทดสอบ02',
            'tel_no' => '0875554214',
            'auth_key' => 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbI_c',
            'password_hash' => '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS',
            'password_reset_token' => null,
            'email' => 'user02.default@example.com',
            'role' => 1,
            'status' => 10,

        ));

        //default password = 123456
        $this->insert('user', array(
            //'id' => 2,
            'username' => 'user03',
            'fname' => 'ผู้ใช้งาน03',
            'lname' => 'ทดสอบ03',
            'tel_no' => '0875456878',
            'auth_key' => 'UnMCS4aTGGG2ulDBz-iNAcg8jDVmbI_d',
            'password_hash' => '$2y$13$9cOOiiLFop4y.IW.rc7W7./6m5U2FCrSLGpicwYe3cwacnIybc4GS',
            'password_reset_token' => null,
            'email' => 'user03.default@example.com',
            'role' => 2,
            'status' => 10,

        ));
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
