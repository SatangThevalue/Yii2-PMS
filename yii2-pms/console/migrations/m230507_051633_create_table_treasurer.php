<?php

use yii\db\Migration;

class m230507_051633_create_table_treasurer extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%treasurer}}',
            [
                'treasurer_id' => $this->primaryKey(),
                'treasurer_note' => $this->text()->notNull()->comment('โน๊ต'),
                'treasurer_amount' => $this->decimal(10, 2)->notNull()->comment('จำนวนเงิน'),
                'treasurer_expenses_type_Fk' => $this->integer()->notNull()->comment('รหัสชนิด'),
                'treasurer_date' => $this->dateTime()->notNull()->comment('วันที่ทำธุรกรรม'),
                'treasurer_category_Fk' => $this->integer()->notNull()->comment('รหัสประเภท'),
                'create_time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('สร้างข้อมูลเมื่อ'),
                'update_time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('อัพเดทข้อมูลเมื่อ'),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'Fk_treasurer_category',
            '{{%treasurer}}',
            ['treasurer_category_Fk'],
            '{{%treasurer_category}}',
            ['treasurer_category_id'],
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'Fk_treasurer_expenses_type',
            '{{%treasurer}}',
            ['treasurer_expenses_type_Fk'],
            '{{%treasurer_type}}',
            ['treasurer_type_id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%treasurer}}');
    }
}
