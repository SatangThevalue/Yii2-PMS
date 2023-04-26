<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_expenses_category".
 *
 * @property int $expenses_category_id รหัสประเภทค่าใช้จ่าย
 * @property string $expenses_category_title ชื่อประเภทค่าใช้จ่าย
 *
 * @property TblExpenses[] $tblExpenses
 */
class ExpensesCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_expenses_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expenses_category_title'], 'required'],
            [['expenses_category_title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expenses_category_id' => 'รหัสประเภทค่าใช้จ่าย',
            'expenses_category_title' => 'ชื่อประเภทค่าใช้จ่าย',
        ];
    }

    /**
     * Gets query for [[TblExpenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblExpenses()
    {
        return $this->hasMany(TblExpenses::class, ['expenses_category_Fk' => 'expenses_category_id']);
    }
}
