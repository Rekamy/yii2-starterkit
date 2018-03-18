<?php

namespace common\models;

use Yii;
use \common\models\base\Migration as BaseMigration;

/**
 * This is the model class for table "migration".
 */
class Migration extends BaseMigration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180]
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
