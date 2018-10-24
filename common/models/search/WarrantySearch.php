<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Warranty;

/**
 * common\models\search\WarrantySearch represents the model behind the search form about `common\models\Warranty`.
 */
 class WarrantySearch extends Warranty
{
    // use \common\components\RelationSFTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'supplier_id', 'type_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['start_date', 'end_date', 'remark', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Warranty::find();

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

        $query->andFilterWhere([
            'id' => $this->id,
            'item_id' => $this->item_id,
            'supplier_id' => $this->supplier_id,
            'type_id' => $this->type_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'remark', $this->remark]);

        // $query->andFilterWhere(['like', 'attribute', $this->$property]);

        return $dataProvider;
    }
}
