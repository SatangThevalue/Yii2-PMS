<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Investment;

/**
 * InvestmentSearch represents the model behind the search form of `common\models\Investment`.
 */
class InvestmentSearch extends Investment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['investment_id', 'investment_type_fk'], 'integer'],
            [['investment_date', 'create_time', 'update_time'], 'safe'],
            [['investment_amount'], 'number'],
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
        $query = Investment::find();

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
            'investment_id' => $this->investment_id,
            'investment_date' => $this->investment_date,
            'investment_type_fk' => $this->investment_type_fk,
            'investment_amount' => $this->investment_amount,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        return $dataProvider;
    }
}
