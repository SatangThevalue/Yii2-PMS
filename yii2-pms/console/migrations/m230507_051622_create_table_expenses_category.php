<?php

use yii\db\Migration;

class m230507_051622_create_table_expenses_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%expenses_category}}',
            [
                'expenses_category_id' => $this->primaryKey()->comment('รหัสประเภทค่าใช้จ่าย'),
                'expenses_category_title' => $this->text()->notNull()->comment('ชื่อประเภทค่าใช้จ่าย'),
            ],
            $tableOptions
        );
        $this->insert('{{%expenses_category}}',['expenses_category_title' => 'เงินเดือน',]);
        $this->insert('{{%expenses_category}}',['expenses_category_title' => 'ค่าเช่าห้อง',]);
        $this->insert('{{%expenses_category}}',['expenses_category_title' => 'ค่าน้ำ',]);
        $this->insert('{{%expenses_category}}',['expenses_category_title' => 'ค่าไฟ',]);
        $this->insert('{{%expenses_category}}',['expenses_category_title' => 'ค่าโทรศัพท์',]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%expenses_category}}');
    }
}
