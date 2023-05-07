<?php

use yii\db\Migration;

class m230507_051630_create_table_working extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%working}}',
            [
                'working_id' => $this->primaryKey(),
                'working_note' => $this->text()->notNull()->comment('โน๊ตการทำงาน'),
                'working_status' => $this->boolean()->notNull()->comment('สถานะการทำงาน'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%working}}');
    }
}
