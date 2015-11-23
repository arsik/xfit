<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cards;

/**
 * SearchCards represents the model behind the search form about `app\models\Cards`.
 */
class SearchCards extends Cards
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cardTypeID', 'clubID', 'cost'], 'integer'],
            [['description','header'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Cards::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cardTypeID' => $this->cardTypeID,
            'clubID' => $this->clubID,
            'cost' => $this->cost,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
