<?php

use yii\db\Migration;

class m230503_054456_create_table_investment extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment}}',
            [
                'investment_id' => $this->primaryKey()->comment('รหัสธุรกรรม'),
                'investment_date' => $this->dateTime()->notNull()->comment('วันที่ทำธุรกรรม'),
                'investment_type_fk' => $this->integer()->notNull()->comment('รหัสประเภท'),
                'investment_amount' => $this->decimal(10, 2)->notNull()->comment('จำนวนเงิน'),
                'create_time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('สร้างข้อมูลเมื่อ'),
                'update_time' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->comment('อัพเดทข้อมูลเมื่อ'),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'fk_investment_type',
            '{{%investment}}',
            ['investment_type_fk'],
            '{{%investment_type}}',
            ['investment_type_id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%investment}}');
    }
}
