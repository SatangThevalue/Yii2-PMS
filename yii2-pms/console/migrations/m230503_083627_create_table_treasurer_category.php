<?php

use yii\db\Migration;

class m230503_083627_create_table_treasurer_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%treasurer_category}}',
            [
                'treasurer_category_id' => $this->primaryKey(),
                'treasurer_category_title' => $this->text()->notNull()->comment('ประเภท'),
            ],
            $tableOptions
        );
        $this->insert('{{%treasurer_category}}', ['treasurer_category_title' => 'เรียกเก็บค่าห้อง']);
        $this->insert('{{%treasurer_category}}', ['treasurer_category_title' => 'ยอดคงค้าง']);
        $this->insert('{{%treasurer_category}}', ['treasurer_category_title' => 'ค่าใช้จ่าย']);
        $this->insert('{{%treasurer_category}}', ['treasurer_category_title' => 'อื่นๆ']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%treasurer_category}}');
    }
}
