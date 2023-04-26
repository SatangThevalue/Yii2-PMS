<?php

use yii\db\Migration;

class m230426_070932_create_table_tbl_expenses extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%tbl_expenses}}',
            [
                'expenses_id' => $this->primaryKey()->comment('รหัสธุรกรรม'),
                'expenses_type' => $this->text()->comment('ชนิดประเภท'),
                'expenses_category_date' => $this->dateTime()->notNull()->comment('วันที่ทำธุรกรรม'),
                'expenses_category_Fk' => $this->integer()->comment('รหัสประเภท'),
                'expenses_amount' => $this->decimal(10, 2)->comment('จำนวนเงิน'),
                'create_time' => $this->timestamp()->comment('วันที่สร้าง'),
                'update_time' => $this->timestamp()->comment('วันที่อัพเดทข้อมูล'),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk_expenses_category',
            '{{%tbl_expenses}}',
            ['expenses_category_Fk'],
            '{{%tbl_expenses_category}}',
            ['expenses_category_id'],
            'SET NULL',
            'SET NULL'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%tbl_expenses}}');
    }
}
