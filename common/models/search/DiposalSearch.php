<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Diposal;

/**
 * common\models\search\DiposalSearch represents the model behind the search form about `common\models\Diposal`.
 */
 class DiposalSearch extends Diposal
{
    // use \common\components\RelationSFTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'transaction_id', 'type_id', 'order_by', 'attend_by', 'approved_by', 'disposed_by', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['order_no', 'order_date', 'attend_date', 'approved_at', 'disposed_at', 'remark', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Diposal::find();

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
            'transaction_id' => $this->transaction_id,
            'order_date' => $this->order_date,
            'attend_date' => $this->attend_date,
            'type_id' => $this->type_id,
            'order_by' => $this->order_by,
            'attend_by' => $this->attend_by,
            'approved_at' => $this->approved_at,
            'approved_by' => $this->approved_by,
            'disposed_at' => $this->disposed_at,
            'disposed_by' => $this->disposed_by,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        $query->andFilterWhere(['like', 'order_no', $this->order_no])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        // $query->andFilterWhere(['like', 'attribute', $this->$property]);

        return $dataProvider;
    }
}
