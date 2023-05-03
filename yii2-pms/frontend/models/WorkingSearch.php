<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Working;

/**
 * WorkingSearch represents the model behind the search form of `common\models\Working`.
 */
class WorkingSearch extends Working
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['working_id', 'working_status'], 'integer'],
            [['working_note'], 'safe'],
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
        $query = Working::find();

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
            'working_id' => $this->working_id,
            'working_status' => $this->working_status,
        ]);

        $query->andFilterWhere(['like', 'working_note', $this->working_note]);

        return $dataProvider;
    }
}
