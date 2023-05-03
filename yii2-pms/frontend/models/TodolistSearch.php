<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Todolist;

/**
 * TodolistSearch represents the model behind the search form of `common\models\Todolist`.
 */
class TodolistSearch extends Todolist
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['todolist_id', 'todolist_status'], 'integer'],
            [['todolist_note'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Todolist::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'todolist_id' => $this->todolist_id,
            'todolist_status' => $this->todolist_status,
        ]);

        $query->andFilterWhere(['like', 'todolist_note', $this->todolist_note]);

        return $dataProvider;
    }
}
