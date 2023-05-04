<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Treasurer;

/**
 * TreasurerSearch represents the model behind the search form of `common\models\Treasurer`.
 */
class TreasurerSearch extends Treasurer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['treasurer_id', 'treasurer_expenses_type_Fk', 'treasurer_category_Fk'], 'integer'],
            [['treasurer_note', 'treasurer_date', 'create_time', 'update_time'], 'safe'],
            [['treasurer_amount'], 'number'],
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
        $query = Treasurer::find();

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
            'treasurer_id' => $this->treasurer_id,
            'treasurer_amount' => $this->treasurer_amount,
            'treasurer_expenses_type_Fk' => $this->treasurer_expenses_type_Fk,
            'treasurer_date' => $this->treasurer_date,
            'treasurer_category_Fk' => $this->treasurer_category_Fk,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'treasurer_note', $this->treasurer_note]);

        return $dataProvider;
    }
}
