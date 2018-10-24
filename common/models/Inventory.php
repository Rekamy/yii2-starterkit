<?php

namespace common\models;

use Yii;
use \common\models\base\Inventory as BaseInventory;

/**
 * This is the model class for table "inventory".
 */
class Inventory extends BaseInventory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['code_no', 'card_no', 'description'], 'required'],
            [['category_id', 'subcategory_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['code_no', 'card_no', 'description', 'remark'], 'string', 'max' => 255]
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
            'category_id' => Yii::t('app', 'Category'),
            'subcategory_id' => Yii::t('app', 'Subcategory'),
            'description' => Yii::t('app', 'Description'),
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
