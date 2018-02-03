<?php

namespace common\models;

use Yii;
use \common\models\base\Branch as BaseBranch;

/**
 * This is the model class for table "branch".
 */
class Branch extends BaseBranch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['company_id', 'status'], 'integer'],
            [['email'], 'required'],
            [['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'], 'safe'],
            [['name', 'address', 'contact', 'email'], 'string', 'max' => 255],
            [['email'], 'unique']
        ]);
    }
	
}
