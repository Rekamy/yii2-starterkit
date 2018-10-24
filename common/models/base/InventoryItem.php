<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "inventory_item".
 *
 * @property integer $id
 * @property integer $code_no
 * @property string $card_no
 * @property string $serial_no
 * @property integer $checkin_id
 * @property integer $checkout_id
 * @property integer $supplier_id
 * @property string $supplier_code_no
 * @property integer $manufacturer_id
 * @property string $manufacturer_code_no
 * @property integer $client_id
 * @property string $client_code_no
 * @property integer $disposal_item_id
 * @property string $remark
 * @property integer $status_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \common\models\Profile $createdBy
 * @property \common\models\Profile $updatedBy
 * @property \common\models\Company $supplier
 * @property \common\models\Company $manufacturer
 * @property \common\models\Company $client
 * @property \common\models\OrderItem $checkin
 * @property \common\models\OrderItem $checkout
 * @property \common\models\GenValue $status
 */
class InventoryItem extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => new \yii\db\Expression('CURRENT_TIMESTAMP'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => new \yii\db\Expression('CURRENT_TIMESTAMP'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public static function relationNames()
    {
        return [
            'createdBy',
            'updatedBy',
            'supplier',
            'manufacturer',
            'client',
            'checkin',
            'checkout',
            'status'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code_no', 'checkin_id', 'checkout_id', 'supplier_id', 'manufacturer_id', 'client_id', 'disposal_item_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['card_no', 'serial_no'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['card_no', 'serial_no', 'supplier_code_no', 'manufacturer_code_no', 'client_code_no', 'remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventory_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'updated_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(\common\models\Company::className(), ['id' => 'supplier_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(\common\models\Company::className(), ['id' => 'manufacturer_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(\common\models\Company::className(), ['id' => 'client_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckin()
    {
        return $this->hasOne(\common\models\OrderItem::className(), ['id' => 'checkin_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckout()
    {
        return $this->hasOne(\common\models\OrderItem::className(), ['id' => 'checkout_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\common\models\GenValue::className(), ['id' => 'status_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('CURRENT_TIMESTAMP'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->andWhere(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \common\models\query\InventoryItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\query\InventoryItemQuery(get_called_class());
        // uncomment and edit permission rule to view own items only
        /*if(\Yii::$app->user->can('permission')){
           $query->mine();
        } */
        // uncomment and edit permission rule to view deleted items
        /*if(\Yii::$app->user->can('see_deleted')){
           return $query;
        } */
        return $query->andWhere(['inventory_item.deleted_by' => 0]);
    }
}
