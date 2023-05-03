<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Expenses;

/**
 * ExpensesSearch represents the model behind the search form of `common\models\Expenses`.
 */
class ExpensesSearch extends Expenses
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expenses_id', 'expenses_type', 'expenses_category_Fk'], 'integer'],
            [['expenses_category_date', 'create_time', 'update_time'], 'safe'],
            [['expenses_amount'], 'number'],
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
        $query = Expenses::find();

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
            'expenses_id' => $this->expenses_id,
            'expenses_type' => $this->expenses_type,
            'expenses_category_date' => $this->expenses_category_date,
            'expenses_category_Fk' => $this->expenses_category_Fk,
            'expenses_amount' => $this->expenses_amount,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);
        return $dataProvider;
    }
}
