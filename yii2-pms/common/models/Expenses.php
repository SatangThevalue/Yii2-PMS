<?php

namespace common\models;
// TODO(SaTangTheValue): use TimestampBehavior in model
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property int $expenses_id รหัสธุรกรรม
 * @property int|null $expenses_type รหัสชนิด
 * @property string $expenses_category_date วันที่ทำธุรกรรม
 * @property int|null $expenses_category_Fk รหัสประเภท
 * @property float|null $expenses_amount จำนวนเงิน
 * @property string|null $create_time วันที่สร้าง
 * @property string|null $update_time วันที่อัพเดทข้อมูล
 *
 * @property ExpensesCategory $expensesCategoryFk
 * @property ExpensesType $expensesType
 */
class Expenses extends \yii\db\ActiveRecord
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
        return 'expenses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expenses_type', 'expenses_category_Fk'], 'integer'],
            [['expenses_category_date'], 'required'],
            [['expenses_category_date', 'create_time', 'update_time'], 'safe'],
            [['expenses_amount'], 'number'],
            [['expenses_category_Fk'], 'exist', 'skipOnError' => true, 'targetClass' => ExpensesCategory::class, 'targetAttribute' => ['expenses_category_Fk' => 'expenses_category_id']],
            [['expenses_type'], 'exist', 'skipOnError' => true, 'targetClass' => ExpensesType::class, 'targetAttribute' => ['expenses_type' => 'expenses_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expenses_id' => 'รหัสธุรกรรม',
            'expenses_type' => 'ชนิด',
            'expenses_category_date' => 'วันที่ทำธุรกรรม',
            'expenses_category_Fk' => 'ประเภท',
            'expenses_amount' => 'จำนวนเงิน',
            'create_time' => 'สร้างข้อมูลเมื่อ',
            'update_time' => 'อัพเดทข้อมูลเมื่อ',
        ];
    }

    /**
     * Gets query for [[ExpensesCategoryFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpensesCategory()
    {
        return $this->hasOne(ExpensesCategory::class, ['expenses_category_id' => 'expenses_category_Fk']);
    }

    /**
     * Gets query for [[ExpensesType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpensesType()
    {
        return $this->hasOne(ExpensesType::class, ['expenses_type_id' => 'expenses_type']);
    }
}
