<?php

use yii\db\Migration;

class m230507_051625_create_table_learning extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%learning}}',
            [
                'learning_id' => $this->primaryKey(),
                'learning_note' => $this->text()->notNull()->comment('โน๊ตการเรียน'),
                'learning_status' => $this->boolean()->notNull()->comment('สถานะ'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%learning}}');
    }
}
