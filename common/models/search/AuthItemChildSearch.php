<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AuthItemChild;

/**
 * common\models\search\AuthItemChildSearch represents the model behind the search form about `common\models\AuthItemChild`.
 */
 class AuthItemChildSearch extends AuthItemChild
{
    // use \common\components\RelationSFTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'child'], 'safe'],
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
        $query = AuthItemChild::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        // $dataProvider->sort->attributes[$property] = [
        //     'asc' => [$attribute => SORT_ASC],
        //     'desc' => [$attribute => SORT_DESC],
        // ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'parent', $this->parent])
            ->andFilterWhere(['like', 'child', $this->child]);

        // $query->andFilterWhere(['like', 'attribute', $this->$property]);

        return $dataProvider;
    }
}
