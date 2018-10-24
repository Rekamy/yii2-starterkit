<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InventoryItem;

/**
 * common\models\search\InventoryItemSearch represents the model behind the search form about `common\models\InventoryItem`.
 */
 class InventoryItemSearch extends InventoryItem
{
    // use \common\components\RelationSFTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code_no', 'checkin_id', 'checkout_id', 'supplier_id', 'manufacturer_id', 'client_id', 'disposal_item_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['card_no', 'serial_no', 'supplier_code_no', 'manufacturer_code_no', 'client_code_no', 'remark', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = InventoryItem::find();

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
            'code_no' => $this->code_no,
            'checkin_id' => $this->checkin_id,
            'checkout_id' => $this->checkout_id,
            'supplier_id' => $this->supplier_id,
            'manufacturer_id' => $this->manufacturer_id,
            'client_id' => $this->client_id,
            'disposal_item_id' => $this->disposal_item_id,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'card_no', $this->card_no])
            ->andFilterWhere(['like', 'serial_no', $this->serial_no])
            ->andFilterWhere(['like', 'supplier_code_no', $this->supplier_code_no])
            ->andFilterWhere(['like', 'manufacturer_code_no', $this->manufacturer_code_no])
            ->andFilterWhere(['like', 'client_code_no', $this->client_code_no])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        // $query->andFilterWhere(['like', 'attribute', $this->$property]);

        return $dataProvider;
    }
}
