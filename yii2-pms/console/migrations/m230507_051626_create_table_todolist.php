<?php

use yii\db\Migration;

class m230507_051626_create_table_todolist extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%todolist}}',
            [
                'todolist_id' => $this->primaryKey()->comment('รหัสสิ่งที่ต้องทำ'),
                'todolist_note' => $this->text()->notNull()->comment('โน๊ต'),
                'todolist_status' => $this->boolean()->notNull()->comment('สถานะ'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%todolist}}');
    }
}
