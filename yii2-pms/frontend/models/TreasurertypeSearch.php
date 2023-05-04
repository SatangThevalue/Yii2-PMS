<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Treasurertype;

/**
 * TreasurertypeSearch represents the model behind the search form of `common\models\Treasurertype`.
 */
class TreasurertypeSearch extends Treasurertype
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treasurer_type_id', 'treasurer_type_title'], 'integer'],
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
        $query = Treasurertype::find();

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
            'treasurer_type_id' => $this->treasurer_type_id,
            'treasurer_type_title' => $this->treasurer_type_title,
        ]);

        return $dataProvider;
    }
}
