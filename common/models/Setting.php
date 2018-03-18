<?php

namespace common\models;

use Yii;
use \common\models\base\Setting as BaseSetting;

/**
 * This is the model class for table "setting".
 */
class Setting extends BaseSetting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['status', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['key', 'label', 'value', 'description', 'remark'], 'string', 'max' => 255]
        ]
        );
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
