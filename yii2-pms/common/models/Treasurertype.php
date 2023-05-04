<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "treasurer_type".
 *
 * @property int $treasurer_type_id
 * @property int $treasurer_type_title ชื่อชนิด
 *
 * @property Treasurer[] $treasurers
 */
class Treasurertype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'treasurer_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treasurer_type_title'], 'required'],
            [['treasurer_type_title'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'treasurer_type_id' => 'Treasurer Type ID',
            'treasurer_type_title' => 'ชื่อชนิด',
        ];
    }

    /**
     * Gets query for [[Treasurers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTreasurers()
    {
        return $this->hasMany(Treasurer::class, ['treasurer_expenses_type_Fk' => 'treasurer_type_id']);
    }
}
