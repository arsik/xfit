<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'clubID', 'managerID', 'sms', 'senderPhone', 'geterPhone'], 'integer'],
            [['payTime', 'deliveryTime', 'createTime', 'session', 'fio'], 'safe'],
            [['fullCost'], 'number'],
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
        $query = Order::find();

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
            'clubID' => $this->clubID,
            'managerID' => $this->managerID,
            'payTime' => $this->payTime,
            'deliveryTime' => $this->deliveryTime,
            'createTime' => $this->createTime,
            'fullCost' => $this->fullCost,
            'sms' => $this->sms,
            'senderPhone' => $this->senderPhone,
            'geterPhone' => $this->geterPhone,
        ]);

        $query->andFilterWhere(['like', 'session', $this->session])
            ->andFilterWhere(['like', 'fio', $this->fio]);

        return $dataProvider;
    }
}
