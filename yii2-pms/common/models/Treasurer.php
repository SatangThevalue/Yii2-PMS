<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "treasurer".
 *
 * @property int $treasurer_id
 * @property string $treasurer_note โน๊ต
 * @property float $treasurer_amount จำนวนเงิน
 * @property int $treasurer_expenses_type_Fk รหัสชนิด
 * @property string $treasurer_date วันที่ทำธุรกรรม
 * @property int $treasurer_category_Fk รหัสประเภท
 * @property string $create_time สร้างข้อมูลเมื่อ
 * @property string $update_time อัพเดทข้อมูลเมื่อ
 *
 * @property Treasurercategory $treasurerCategoryFk
 * @property TreasurerType $treasurerExpensesTypeFk
 */
class Treasurer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'treasurer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treasurer_note', 'treasurer_amount', 'treasurer_expenses_type_Fk', 'treasurer_category_Fk'], 'required'],
            [['treasurer_note'], 'string'],
            [['treasurer_amount'], 'number'],
            [['treasurer_expenses_type_Fk', 'treasurer_category_Fk'], 'integer'],
            [['treasurer_date', 'create_time', 'update_time'], 'safe'],
            [['treasurer_category_Fk'], 'exist', 'skipOnError' => true, 'targetClass' => ExpensesCategory::class, 'targetAttribute' => ['treasurer_category_Fk' => 'expenses_category_id']],
            [['treasurer_expenses_type_Fk'], 'exist', 'skipOnError' => true, 'targetClass' => TreasurerType::class, 'targetAttribute' => ['treasurer_expenses_type_Fk' => 'treasurer_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'treasurer_id' => 'Treasurer ID',
            'treasurer_note' => 'โน๊ต',
            'treasurer_amount' => 'จำนวนเงิน',
            'treasurer_expenses_type_Fk' => 'รหัสชนิด',
            'treasurer_date' => 'วันที่ทำธุรกรรม',
            'treasurer_category_Fk' => 'รหัสประเภท',
            'create_time' => 'สร้างข้อมูลเมื่อ',
            'update_time' => 'อัพเดทข้อมูลเมื่อ',
        ];
    }

    /**
     * Gets query for [[TreasurerCategoryFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTreasurerCategory()
    {
        return $this->hasOne(Treasurercategory::class, ['treasurer_category_id' => 'treasurer_category_Fk']);
    }

    /**
     * Gets query for [[TreasurerExpensesTypeFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTreasurerExpensesType()
    {
        return $this->hasOne(TreasurerType::class, ['treasurer_type_id' => 'treasurer_expenses_type_Fk']);
    }
}
