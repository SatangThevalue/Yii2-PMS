<?php

use yii\db\Migration;

class m230503_083648_create_table_treasurer_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%treasurer_type}}',
            [
                'treasurer_type_id' => $this->primaryKey(),
                'treasurer_type_title' => $this->text()->notNull()->comment('ชื่อชนิด'),
            ],
            $tableOptions
        );
        $this->insert('{{%treasurer_type}}',array('treasurer_type_title' => 'รายรับ' ));
        $this->insert('{{%treasurer_type}}',array('treasurer_type_title' => 'รายจ่าย' ));
    }

    public function safeDown()
    {
        $this->dropTable('{{%treasurer_type}}');
    }
}
