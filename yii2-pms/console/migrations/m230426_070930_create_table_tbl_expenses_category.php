<?php

use yii\db\Migration;

class m230426_070930_create_table_tbl_expenses_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%tbl_expenses_category}}',
            [
                'expenses_category_id' => $this->primaryKey()->comment('รหัสประเภทค่าใช้จ่าย'),
                'expenses_category_title' => $this->text()->notNull()->comment('ชื่อประเภทค่าใช้จ่าย'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%tbl_expenses_category}}');
    }
}
