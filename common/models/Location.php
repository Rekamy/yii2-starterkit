<?php

namespace common\models;

use Yii;
use \common\models\base\Location as BaseLocation;

/**
 * This is the model class for table "location".
 */
class Location extends BaseLocation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['company_id', 'poscode', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['name', 'email'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['code', 'name', 'address', 'city', 'state', 'country', 'contact', 'fax', 'email', 'email_secondary', 'remark'], 'string', 'max' => 255]
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
            'code' => Yii::t('app', 'Code'),
            'company_id' => Yii::t('app', 'Company'),
            'name' => Yii::t('app', 'Name'),
            'address' => Yii::t('app', 'Address'),
            'city' => Yii::t('app', 'City'),
            'poscode' => Yii::t('app', 'Poscode'),
            'state' => Yii::t('app', 'State'),
            'country' => Yii::t('app', 'Country'),
            'contact' => Yii::t('app', 'Contact'),
            'fax' => Yii::t('app', 'Fax'),
            'email' => Yii::t('app', 'Email'),
            'email_secondary' => Yii::t('app', 'Email Secondary'),
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
