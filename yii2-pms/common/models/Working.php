<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "working".
 *
 * @property int $working_id
 * @property string $working_note โน๊ตการทำงาน
 * @property int $working_status สถานะการทำงาน
 */
class Working extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'working';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['working_note', 'working_status'], 'required'],
            [['working_note'], 'string'],
            [['working_status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'working_id' => 'Working ID',
            'working_note' => 'โน๊ตการทำงาน',
            'working_status' => 'สถานะการทำงาน',
        ];
    }
    public function getCountWorkingStatusNo()
    {
        $command = Yii::$app->db->createCommand("SELECT COUNT(working.working_status) FROM working WHERE working.working_status = 0");
        $CountWorking = $command->queryScalar();
        if($CountWorking <> ""){
            return $CountWorking;
        }else {
            return 0;
        }
    }
    public function getCountWorkingStatusYes()
    {
        $command = Yii::$app->db->createCommand("SELECT COUNT(working.working_status) FROM working WHERE working.working_status = 1");
        $CountWorking = $command->queryScalar();
        if($CountWorking <> ""){
            return $CountWorking;
        }else {
            return 0;
        }
    }
}
