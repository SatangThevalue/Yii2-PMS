<?php

use yii\db\Migration;

class m230426_124550_create_table_expenses_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%expenses_type}}',
            [
                'expenses_type_id' => $this->primaryKey()->comment('รหัสชนิด'),
                'expenses_type_title' => $this->text()->notNull()->comment('ชื่อชนิด'),
            ],
            $tableOptions
        );
        $this->insert('{{%expenses_type}}',array('expenses_category_title' => 'เงินเดือน'));
        $this->insert('{{%expenses_type}}',array('expenses_category_title' => 'เงินพิเศษ'));
        $this->insert('{{%expenses_type}}',array('expenses_category_title' => 'ค่าห้อง'));
        $this->insert('{{%expenses_type}}',array('expenses_category_title' => 'ค่าอาหาร'));
        $this->insert('{{%expenses_type}}',array('expenses_category_title' => 'ค่าเดินทาง'));
    }

    public function safeDown()
    {
        $this->dropTable('{{%expenses_type}}');
    }
}
