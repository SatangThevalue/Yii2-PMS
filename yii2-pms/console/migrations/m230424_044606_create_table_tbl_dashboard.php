<?php

use yii\db\Migration;

class m230424_044606_create_table_tbl_dashboard extends Migration
{
    // TODO(SaTangTheValue): create tbl_dashboard
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%tbl_dashboard}}',
            [
                'dashboard_id' => $this->primaryKey()->comment('dashboard_id'),
                'dashboard_key' => $this->string()->notNull()->comment('ชื่อคีย์'),
                'dashboard_value' => $this->text()->notNull()->comment('ค่าคีย์'),
                'dashboard_details' => $this->text()->notNull()->comment('รายละเอียด'),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%tbl_dashboard}}');
    }
}
