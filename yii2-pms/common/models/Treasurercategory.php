<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "treasurer_category".
 *
 * @property int $treasurer_category_id
 * @property string $treasurer_category_title ประเภท
 */
class Treasurercategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'treasurer_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treasurer_category_title'], 'required'],
            [['treasurer_category_title'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'treasurer_category_id' => 'Treasurer Category ID',
            'treasurer_category_title' => 'ประเภท',
        ];
    }
}
