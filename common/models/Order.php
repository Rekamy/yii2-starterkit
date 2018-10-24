<?php

namespace common\models;

use Yii;
use \common\models\base\Order as BaseOrder;

/**
 * This is the model class for table "order".
 */
class Order extends BaseOrder
{
    const ASSET = 'asset';
    const INVENTORY = 'inventory';
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
           [
            [['transaction_id', 'type_id', 'seller_id', 'buyyer_id', 'order_by', 'attend_by', 'approved_by', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
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
            'transaction_id' => Yii::t('app', 'Transaction'),
            'order_no' => Yii::t('app', 'The receipt no / order no / work order no for particular transaction.<br> You may change the order no as long as it is unique. One provided by manual will not be included in the sequence.'),
            'order_date' => Yii::t('app', 'Order Date'),
            'attend_date' => Yii::t('app', 'Attend Date'),
            'type_id' => Yii::t('app', 'Type'),
            'seller_id' => Yii::t('app', 'Supplier or Seller Name or company that <strong>provide</strong> the item purchased'),
            'buyyer_id' => Yii::t('app', 'Company or Buyyer Name that <strong>received</strong> the item purchased'),
            'order_by' => Yii::t('app', 'Personel that make or request for this particular order'),
            'attend_by' => Yii::t('app', 'Personel that received this particular order/request'),
            'approved_at' => Yii::t('app', 'Approved At'),
            'approved_by' => Yii::t('app', 'Approved By'),
            'remark' => Yii::t('app', 'Notes'),
            'status_id' => Yii::t('app', 'Status'),
        ];
    }

    public function generateOrderNo($type = null)
    {
        switch ($type) {
            case self::ASSET:
            $prefix = 'MZM/ASET/'.date('Y').'/';
            break;
            case self::INVENTORY:
            $prefix = 'MZM/INV/'.date('Y').'/';
            break;
            
            default:
            $prefix = 'MZM/'.date('Y').'/';
            break;
        }

        $max = self::find()->asArray()
        ->andWhere(['like', 'order_no', $prefix])
        ->max('order_no');

        if($max) {
            $max = substr($max, -5);
            $max++;
            return $prefix. str_pad($max, 5, 0, STR_PAD_LEFT);
        }

        return $prefix.'00001';
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
