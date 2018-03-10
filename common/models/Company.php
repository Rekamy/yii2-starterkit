<?php

namespace common\models;

use Yii;
use \common\models\base\Company as BaseCompany;

/**
 * This is the model class for table "company".
 */
class Company extends BaseCompany
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['email','name'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by'], 'safe'],
            [['address', 'contact', 'email'], 'string', 'max' => 255],
            [['email'], 'unique']
        ]);
    }

}
