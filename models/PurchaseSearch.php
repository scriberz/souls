<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PurchaseSearch extends Purchase
{
    public $date_filter;

    public function rules()
    {
        return [
            [['product_id', 'currency_id'], 'integer'],
            [['date_filter'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Purchase::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['purchase_date' => SORT_DESC],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['product_id' => $this->product_id]);
        $query->andFilterWhere(['currency_id' => $this->currency_id]);

        if ($this->date_filter == 'today') {
            $query->andWhere(['>=', 'purchase_date', date('Y-m-d 00:00:00')]);
        } elseif ($this->date_filter == 'week') {
            $query->andWhere(['>=', 'purchase_date', date('Y-m-d 00:00:00', strtotime('-1 week'))]);
        }

        return $dataProvider;
    }
}
