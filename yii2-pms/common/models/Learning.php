<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "learning".
 *
 * @property int $learning_id
 * @property string $learning_note โน๊ตการเรียน
 * @property int $learning_status สถานะ
 */
class Learning extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'learning';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['learning_note', 'learning_status'], 'required'],
            [['learning_note'], 'string'],
            [['learning_status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'learning_id' => 'Learning ID',
            'learning_note' => 'โน๊ตการเรียน',
            'learning_status' => 'สถานะ',
        ];
    }
    public function getCountLearningStatusNo()
    {
        $command = Yii::$app->db->createCommand("SELECT COUNT(learning.learning_status) FROM learning WHERE learning.learning_status = 0");
        $CountLearning = $command->queryScalar();
        if($CountLearning <> ""){
            return $CountLearning;
        }else {
            return 0;
        }
    }
    public function getCountLearningStatusYes()
    {
        $command = Yii::$app->db->createCommand("SELECT COUNT(learning.learning_status) FROM learning WHERE learning.learning_status = 1");
        $CountLearning = $command->queryScalar();
        if($CountLearning <> ""){
            return $CountLearning;
        }else {
            return 0;
        }
    }
}
