<?php

use yii\db\Migration;

class m230426_124553_create_foreign_keys extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'fk_user_created_by_user_id',
            '{{%user}}',
            ['created_by_user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_user_updated_by_user_id',
            '{{%user}}',
            ['updated_by_user_id'],
            '{{%user}}',
            ['id'],
            'RESTRICT',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_user_updated_by_user_id', '{{%user}}');
        $this->dropForeignKey('fk_user_created_by_user_id', '{{%user}}');
    }
}
