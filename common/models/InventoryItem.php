<?php

namespace common\models;

use Yii;
use \common\models\base\InventoryItem as BaseInventoryItem;

/**
 * This is the model class for table "inventory_item".
 */
class InventoryItem extends BaseInventoryItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['code_no', 'checkin_id', 'checkout_id', 'supplier_id', 'manufacturer_id', 'client_id', 'disposal_item_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['card_no', 'serial_no'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['card_no', 'serial_no', 'supplier_code_no', 'manufacturer_code_no', 'client_code_no', 'remark'], 'string', 'max' => 255]
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
            'code_no' => Yii::t('app', 'Code No'),
            'card_no' => Yii::t('app', 'Card No'),
            'serial_no' => Yii::t('app', 'Serial No'),
            'checkin_id' => Yii::t('app', 'Checkin ID'),
            'checkout_id' => Yii::t('app', 'Checkout ID'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'supplier_code_no' => Yii::t('app', 'Supplier Code No'),
            'manufacturer_id' => Yii::t('app', 'Manufacturer'),
            'manufacturer_code_no' => Yii::t('app', 'Manufacturer Code No'),
            'client_id' => Yii::t('app', 'Client'),
            'client_code_no' => Yii::t('app', 'Client Code No'),
            'disposal_item_id' => Yii::t('app', 'Disposal ID'),
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
