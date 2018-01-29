<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Services;

/**
 * ServicesSearch represents the model behind the search form about `app\models\Services`.
 */
class ServicesSearch extends Services
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'serviceCategoriesId', 'hairdressersId'], 'integer'],
            [['title', 'description', 'dateCreating'], 'safe'],
            [['price'], 'number'],
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
        $query = Services::find();

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
            'price' => $this->price,
            'dateCreating' => $this->dateCreating,
            'serviceCategoriesId' => $this->serviceCategoriesId,
            'hairdressersId' => $this->hairdressersId,
        ]);
        if(isset($_GET['start_price']) && isset($_GET['end_price'])){
            $query->andFilterWhere(['between', 'price', $_GET['start_price'], $_GET['end_price']]);
        }
        if(isset($_GET['hairdresser'])){
            $query->andFilterWhere(['hairdressersId' => $_GET['hairdresser'] ]);
        }
        if(isset($_GET['category'])){
            $query->andFilterWhere(['serviceCategoriesId' => $_GET['category'] ]);
        }
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
