<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_dashboard".
 *
 * @property int $dashboard_id dashboard_id
 * @property string $dashboard_key ชื่อคีย์
 * @property string $dashboard_value ค่าคีย์
 * @property string $dashboard_details รายละเอียด
 */
class Dashboard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_dashboard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dashboard_key', 'dashboard_value', 'dashboard_details'], 'required'],
            [['dashboard_value', 'dashboard_details'], 'string'],
            [['dashboard_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dashboard_id' => 'dashboard_id',
            'dashboard_key' => 'ชื่อคีย์',
            'dashboard_value' => 'ค่าคีย์',
            'dashboard_details' => 'รายละเอียด',
        ];
    }
}
