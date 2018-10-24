<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "diposal_item".
 *
 * @property integer $id
 * @property integer $disposal_id
 * @property integer $item_id
 * @property string $order_no
 * @property string $order_date
 * @property string $attend_date
 * @property integer $type_id
 * @property integer $reason_id
 * @property integer $method_id
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
 * @property \common\models\Profile $orderBy
 * @property \common\models\Profile $attendBy
 * @property \common\models\Profile $approvedBy
 * @property \common\models\Profile $createdBy
 * @property \common\models\Profile $updatedBy
 * @property \common\models\GenValue $type
 * @property \common\models\GenValue $reason
 * @property \common\models\GenValue $method
 * @property \common\models\GenValue $status
 */
class DiposalItem extends \yii\db\ActiveRecord
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
            'orderBy',
            'attendBy',
            'approvedBy',
            'createdBy',
            'updatedBy',
            'type',
            'reason',
            'method',
            'status'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['disposal_id', 'item_id', 'type_id', 'reason_id', 'method_id', 'order_by', 'attend_by', 'approved_by', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
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
        return 'diposal_item';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'disposal_id' => Yii::t('app', 'Disposal'),
            'item_id' => Yii::t('app', 'Item'),
            'order_no' => Yii::t('app', 'Order No'),
            'order_date' => Yii::t('app', 'Order Date'),
            'attend_date' => Yii::t('app', 'Attend Date'),
            'type_id' => Yii::t('app', 'Type'),
            'reason_id' => Yii::t('app', 'Reason'),
            'method_id' => Yii::t('app', 'Method'),
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
    public function getType()
    {
        return $this->hasOne(\common\models\GenValue::className(), ['id' => 'type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReason()
    {
        return $this->hasOne(\common\models\GenValue::className(), ['id' => 'reason_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMethod()
    {
        return $this->hasOne(\common\models\GenValue::className(), ['id' => 'method_id']);
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
     * @return \common\models\query\DiposalItemQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\query\DiposalItemQuery(get_called_class());
        // uncomment and edit permission rule to view own items only
        /*if(\Yii::$app->user->can('permission')){
           $query->mine();
        } */
        // uncomment and edit permission rule to view deleted items
        /*if(\Yii::$app->user->can('see_deleted')){
           return $query;
        } */
        return $query->andWhere(['diposal_item.deleted_by' => 0]);
    }
}
