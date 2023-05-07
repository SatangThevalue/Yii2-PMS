<?php

use yii\db\Migration;

class m230507_051624_create_table_investment_type extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%investment_type}}',
            [
                'investment_type_id' => $this->primaryKey(),
                'investment_type_title' => $this->text()->notNull()->comment('ประเภทการลงทุน'),
            ],
            $tableOptions
        );
        $this->insert('{{%investment_type}}',['investment_type_title' => 'ประกัน',]);
        $this->insert('{{%investment_type}}',['investment_type_title' => 'หุ้น',]);
        $this->insert('{{%investment_type}}',['investment_type_title' => 'กองทุน',]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%investment_type}}');
    }
}
