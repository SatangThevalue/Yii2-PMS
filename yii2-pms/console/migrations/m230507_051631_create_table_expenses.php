<?php

use yii\db\Migration;

class m230507_051631_create_table_expenses extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%expenses}}',
            [
                'expenses_id' => $this->primaryKey()->comment('รหัสธุรกรรม'),
                'expenses_type' => $this->integer()->comment('รหัสชนิด'),
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
            '{{%expenses}}',
            ['expenses_category_Fk'],
            '{{%expenses_category}}',
            ['expenses_category_id'],
            'SET NULL',
            'SET NULL'
        );
        $this->addForeignKey(
            'fk_expenses_type',
            '{{%expenses}}',
            ['expenses_type'],
            '{{%expenses_type}}',
            ['expenses_type_id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%expenses}}');
    }
}
