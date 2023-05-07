<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "todolist".
 *
 * @property int $todolist_id รหัสสิ่งที่ต้องทำ
 * @property string $todolist_note โน๊ต
 * @property int $todolist_status สถานะ
 */
class Todolist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'todolist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['todolist_note', 'todolist_status'], 'required'],
            [['todolist_note'], 'string'],
            [['todolist_status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'todolist_id' => 'รหัสสิ่งที่ต้องทำ',
            'todolist_note' => 'โน๊ต',
            'todolist_status' => 'สถานะ',
        ];
    }
    public function getCountTodolistStatusNo()
    {
        $command = Yii::$app->db->createCommand("SELECT COUNT(todolist.todolist_status) FROM todolist WHERE todolist.todolist_status = 0");
        $CountTodolist = $command->queryScalar();
        if($CountTodolist <> ""){
            return $CountTodolist;
        }else {
            return 0;
        }
    }
    public function getCountTodolistStatusYes()
    {
        $command = Yii::$app->db->createCommand("SELECT COUNT(todolist.todolist_status) FROM todolist WHERE todolist.todolist_status = 1");
        $CountTodolist = $command->queryScalar();
        if($CountTodolist <> ""){
            return $CountTodolist;
        }else {
            return 0;
        }
    }
}
