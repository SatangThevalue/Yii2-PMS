<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExpensesCategory;

/**
 * ExpensesCategorySearch represents the model behind the search form of `common\models\ExpensesCategory`.
 */
class ExpensesCategorySearch extends ExpensesCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expenses_category_id'], 'integer'],
            [['expenses_category_title'], 'safe'],
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
        $query = ExpensesCategory::find();

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
            'expenses_category_id' => $this->expenses_category_id,
        ]);

        $query->andFilterWhere(['like', 'expenses_category_title', $this->expenses_category_title]);

        return $dataProvider;
    }
}
