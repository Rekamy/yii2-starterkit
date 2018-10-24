<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "order".
 *
 * @property integer $id
 * @property integer $transaction_id
 * @property string $order_no
 * @property string $order_date
 * @property string $attend_date
 * @property integer $type_id
 * @property integer $seller_id
 * @property integer $buyyer_id
 * @property integer $order_by
 * @property integer $attend_by
 * @property string $approved_at
 * @property integer $approved_by
 * @property string $remark
 * @property integer $status_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \common\models\Company $seller
 * @property \common\models\GenValue $type
 * @property \common\models\GenValue $status
 * @property \common\models\Company $buyyer
 * @property \common\models\Profile $orderBy
 * @property \common\models\Profile $attendBy
 * @property \common\models\Profile $approvedBy
 * @property \common\models\Profile $createdBy
 * @property \common\models\Profile $updatedBy
 * @property \common\models\Transaction $transaction
 * @property \common\models\OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
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
            'seller',
            'type',
            'status',
            'buyyer',
            'orderBy',
            'attendBy',
            'approvedBy',
            'createdBy',
            'updatedBy',
            'transaction',
            'orderItems'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transaction_id', 'type_id', 'seller_id', 'buyyer_id', 'order_by', 'attend_by', 'approved_by', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['order_no'], 'required'],
            [['order_date', 'attend_date', 'approved_at', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['order_no', 'remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'transaction_id' => Yii::t('app', 'Transaction'),
            'order_no' => Yii::t('app', 'Order No'),
            'order_date' => Yii::t('app', 'Order Date'),
            'attend_date' => Yii::t('app', 'Attend Date'),
            'type_id' => Yii::t('app', 'Type'),
            'seller_id' => Yii::t('app', 'Supplier'),
            'buyyer_id' => Yii::t('app', 'Company'),
            'order_by' => Yii::t('app', 'Order By'),
            'attend_by' => Yii::t('app', 'Attend By'),
            'approved_at' => Yii::t('app', 'Approved At'),
            'approved_by' => Yii::t('app', 'Approved By'),
            'remark' => Yii::t('app', 'Remark'),
            'status_id' => Yii::t('app', 'Status'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeller()
    {
        return $this->hasOne(\common\models\Company::className(), ['id' => 'seller_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(\common\models\GenValue::className(), ['id' => 'type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\common\models\GenValue::className(), ['id' => 'status_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyyer()
    {
        return $this->hasOne(\common\models\Company::className(), ['id' => 'buyyer_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'order_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'attend_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApprovedBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'approved_by']);
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
    public function getTransaction()
    {
        return $this->hasOne(\common\models\Transaction::className(), ['id' => 'transaction_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(\common\models\OrderItem::className(), ['order_id' => 'id']);
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
     * @return \common\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\query\OrderQuery(get_called_class());
        // uncomment and edit permission rule to view own items only
        /*if(\Yii::$app->user->can('permission')){
           $query->mine();
        } */
        // uncomment and edit permission rule to view deleted items
        /*if(\Yii::$app->user->can('see_deleted')){
           return $query;
        } */
        return $query->andWhere(['order.deleted_by' => 0]);
    }
}
