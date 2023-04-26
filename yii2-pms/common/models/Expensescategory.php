<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expenses_category".
 *
 * @property int $expenses_category_id รหัสประเภทค่าใช้จ่าย
 * @property string $expenses_category_title ชื่อประเภทค่าใช้จ่าย
 *
 * @property Expenses[] $expenses
 */
class Expensescategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expenses_category';
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
     * Gets query for [[Expenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpenses()
    {
        return $this->hasMany(Expenses::class, ['expenses_category_Fk' => 'expenses_category_id']);
    }
}
