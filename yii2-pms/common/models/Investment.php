<?php

namespace common\models;
// TODO(SaTangTheValue): use TimestampBehavior in model
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "investment".
 *
 * @property int $investment_id รหัสธุรกรรม
 * @property string $investment_date วันที่ทำธุรกรรม
 * @property int $investment_type_fk รหัสประเภท
 * @property float $investment_amount จำนวนเงิน
 * @property string $create_time สร้างข้อมูลเมื่อ
 * @property string $update_time อัพเดทข้อมูลเมื่อ
 *
 * @property InvestmentType $investmentTypeFk
 */
class Investment extends \yii\db\ActiveRecord
{
    // TODO(SaTangTheValue): add TimestampBehavior in model
    public function behaviors()
    {
        return [

            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => 'update_time',
                'value' => new Expression('NOW()'), //กำหนดค่า หรืออาจใช้ค่าอย่างอื่นที่ return เป็น timestamp ก็ได้
            ],
            //other behaviors
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['investment_date', 'investment_type_fk', 'investment_amount'], 'required'],
            [['investment_date', 'create_time', 'update_time'], 'safe'],
            [['investment_type_fk'], 'integer'],
            [['investment_amount'], 'number'],
            [['investment_type_fk'], 'exist', 'skipOnError' => true, 'targetClass' => InvestmentType::class, 'targetAttribute' => ['investment_type_fk' => 'investment_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'investment_id' => 'รหัสธุรกรรม',
            'investment_date' => 'วันที่ทำธุรกรรม',
            'investment_type_fk' => 'รหัสประเภท',
            'investment_amount' => 'จำนวนเงิน',
            'create_time' => 'สร้างข้อมูลเมื่อ',
            'update_time' => 'อัพเดทข้อมูลเมื่อ',
        ];
    }

    /**
     * Gets query for [[InvestmentTypeFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvestmentType()
    {
        return $this->hasOne(InvestmentType::class, ['investment_type_id' => 'investment_type_fk']);
    }
}
