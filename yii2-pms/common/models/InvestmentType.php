<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "investment_type".
 *
 * @property int $investment_type_id
 * @property string $investment_type_title ประเภทการลงทุน
 *
 * @property Investment[] $investments
 */
class InvestmentType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'investment_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['investment_type_title'], 'required'],
            [['investment_type_title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'investment_type_id' => 'Investment Type ID',
            'investment_type_title' => 'ประเภทการลงทุน',
        ];
    }

    /**
     * Gets query for [[Investments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvestments()
    {
        return $this->hasMany(Investment::class, ['investment_type_fk' => 'investment_type_id']);
    }
}
