<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_expenses".
 *
 * @property int $expenses_id รหัสธุรกรรม
 * @property string|null $expenses_type ชนิดประเภท
 * @property string $expenses_category_date วันที่ทำธุรกรรม
 * @property int|null $expenses_category_Fk รหัสประเภท
 * @property float|null $expenses_amount จำนวนเงิน
 * @property string|null $create_time วันที่สร้าง
 * @property string|null $update_time วันที่อัพเดทข้อมูล
 *
 * @property TblExpensesCategory $expensesCategoryFk
 */
class Expenses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_expenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expenses_type'], 'string'],
            [['expenses_category_date'], 'required'],
            [['expenses_category_date', 'create_time', 'update_time'], 'safe'],
            [['expenses_category_Fk'], 'integer'],
            [['expenses_amount'], 'number'],
            [['expenses_category_Fk'], 'exist', 'skipOnError' => true, 'targetClass' => TblExpensesCategory::class, 'targetAttribute' => ['expenses_category_Fk' => 'expenses_category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expenses_id' => 'รหัสธุรกรรม',
            'expenses_type' => 'ชนิดประเภท',
            'expenses_category_date' => 'วันที่ทำธุรกรรม',
            'expenses_category_Fk' => 'รหัสประเภท',
            'expenses_amount' => 'จำนวนเงิน',
            'create_time' => 'วันที่สร้าง',
            'update_time' => 'วันที่อัพเดทข้อมูล',
        ];
    }

    /**
     * Gets query for [[ExpensesCategoryFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpensesCategoryFk()
    {
        return $this->hasOne(TblExpensesCategory::class, ['expenses_category_id' => 'expenses_category_Fk']);
    }
}
