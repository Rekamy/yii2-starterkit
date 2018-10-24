<?php

namespace common\models;

use Yii;
use \common\models\base\Warranty as BaseWarranty;

/**
 * This is the model class for table "warranty".
 */
class Warranty extends BaseWarranty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['item_id'], 'required'],
            [['item_id', 'supplier_id', 'type_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['remark'], 'string', 'max' => 255]
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
            'item_id' => Yii::t('app', 'Item'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'type_id' => Yii::t('app', 'Type'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
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
