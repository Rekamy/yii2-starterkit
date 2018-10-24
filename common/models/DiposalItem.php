<?php

namespace common\models;

use Yii;
use \common\models\base\DiposalItem as BaseDiposalItem;

/**
 * This is the model class for table "diposal_item".
 */
class DiposalItem extends BaseDiposalItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['disposal_id', 'item_id', 'type_id', 'reason_id', 'method_id', 'order_by', 'attend_by', 'approved_by', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['order_no'], 'required'],
            [['order_date', 'attend_date', 'approved_at', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['order_no', 'remark'], 'string', 'max' => 255]
        ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'disposal_id' => Yii::t('app', 'Disposal'),
            'item_id' => Yii::t('app', 'Item'),
            'order_no' => Yii::t('app', 'Order No'),
            'order_date' => Yii::t('app', 'Order Date'),
            'attend_date' => Yii::t('app', 'Attend Date'),
            'type_id' => Yii::t('app', 'Type'),
            'reason_id' => Yii::t('app', 'Reason'),
            'method_id' => Yii::t('app', 'Method'),
            'order_by' => Yii::t('app', 'Order By'),
            'attend_by' => Yii::t('app', 'Attend By'),
            'approved_at' => Yii::t('app', 'Approved At'),
            'approved_by' => Yii::t('app', 'Approved By'),
            'remark' => Yii::t('app', 'Remark'),
            'status_id' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     */
    /* public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        // add code here. given sample code
        if ($insert === false) {
            return; // only work with newly created payments
        }

        if ($this->credit->save(false) === false) {
            throw new Exception("credit couldn't be update");
        }
    } */

    /**
     * @inheritdoc
     */
    /* public function beforeSave($insert)
    {
        // custom code here
        return parent::beforeSave($insert);
    } */
}
