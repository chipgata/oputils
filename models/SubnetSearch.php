<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subnet;

/**
 * SubnetSearch represents the model behind the search form about `app\models\Subnet`.
 */
class SubnetSearch extends Subnet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'subnet_group_id'], 'integer'],
            [['name', 'desc', 'network_address', 'subnet_mask'], 'safe'],
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
        $query = Subnet::find();

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
            'id' => $this->id,
            'subnet_group_id' => $this->subnet_group_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'network_address', $this->network_address])
            ->andFilterWhere(['like', 'subnet_mask', $this->subnet_mask]);

        return $dataProvider;
    }
}
