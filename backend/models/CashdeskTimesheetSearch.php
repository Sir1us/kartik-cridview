<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CashdeskTimesheet;

/**
 * CashdeskTimesheetSearch represents the model behind the search form about `backend\models\CashdeskTimesheet`.
 */
class CashdeskTimesheetSearch extends CashdeskTimesheet
{
    public function rules()
    {
        return [
            [['id', 'cashier', 'cashdesk'], 'integer'],
            [['opendt', 'closedt'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = CashdeskTimesheet::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'cashier' => $this->cashier,
            'cashdesk' => $this->cashdesk,
            'opendt' => $this->opendt,
            'closedt' => $this->closedt,
        ]);

        return $dataProvider;
    }
}
