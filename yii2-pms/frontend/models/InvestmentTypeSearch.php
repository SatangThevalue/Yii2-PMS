<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InvestmentType;

/**
 * InvestmenttypeSearch represents the model behind the search form of `common\models\InvestmentType`.
 */
class InvestmenttypeSearch extends InvestmentType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['investment_type_id'], 'integer'],
            [['investment_type_title'], 'safe'],
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
        $query = InvestmentType::find();

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
            'investment_type_id' => $this->investment_type_id,
        ]);

        $query->andFilterWhere(['like', 'investment_type_title', $this->investment_type_title]);

        return $dataProvider;
    }
}
