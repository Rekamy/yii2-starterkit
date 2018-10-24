<?php

namespace common\models;

use Yii;
use \common\models\base\Asset as BaseAsset;

/**
 * This is the model class for table "asset".
 */
class Asset extends BaseAsset
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['category_id', 'subcategory_id', 'supplier_id', 'manufacturer_id', 'disposal_item_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['asset_no', 'description'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['asset_no', 'description', 'supplier_code_no', 'manufacturer_code_no', 'remark'], 'string', 'max' => 255]
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
            'category_id' => Yii::t('app', 'Category'),
            'subcategory_id' => Yii::t('app', 'Subcategory'),
            'asset_no' => Yii::t('app', 'Asset No'),
            'description' => Yii::t('app', 'Description'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'supplier_code_no' => Yii::t('app', 'Supplier Code No'),
            'manufacturer_id' => Yii::t('app', 'Manufacturer'),
            'manufacturer_code_no' => Yii::t('app', 'Manufacturer Code No'),
            'disposal_item_id' => Yii::t('app', 'Disposal Item ID'),
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
