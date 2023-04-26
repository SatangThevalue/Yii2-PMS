<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expenses_type".
 *
 * @property int $expenses_type_id รหัสชนิด
 * @property string $expenses_type_title ชื่อชนิด
 *
 * @property Expenses[] $expenses
 */
class Expensestype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expenses_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expenses_type_title'], 'required'],
            [['expenses_type_title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'expenses_type_id' => 'รหัสชนิด',
            'expenses_type_title' => 'ชื่อชนิด',
        ];
    }

    /**
     * Gets query for [[Expenses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpenses()
    {
        return $this->hasMany(Expenses::class, ['expenses_type' => 'expenses_type_id']);
    }
}
