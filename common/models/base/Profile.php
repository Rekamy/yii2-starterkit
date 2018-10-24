<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $ic_no
 * @property string $contact
 * @property string $staff_no
 * @property string $email
 * @property string $remark
 * @property integer $status_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \common\models\Asset[] $assets
 * @property \common\models\Category[] $categories
 * @property \common\models\Company[] $companies
 * @property \common\models\Diposal[] $diposals
 * @property \common\models\DiposalItem[] $diposalItems
 * @property \common\models\GenMod[] $genMods
 * @property \common\models\GenModref[] $genModrefs
 * @property \common\models\GenModrefProgress[] $genModrefProgresses
 * @property \common\models\GenModtype[] $genModtypes
 * @property \common\models\GenValue[] $genValues
 * @property \common\models\Inventory[] $inventories
 * @property \common\models\InventoryItem[] $inventoryItems
 * @property \common\models\JtSubcategory[] $jtSubcategories
 * @property \common\models\Location[] $locations
 * @property \common\models\Maintenance[] $maintenances
 * @property \common\models\Movement[] $movements
 * @property \common\models\Order[] $orders
 * @property \common\models\OrderItem[] $orderItems
 * @property \common\models\PersonInCharge[] $personInCharges
 * @property \common\models\GenValue $status
 * @property \common\models\Profile $createdBy
 * @property \common\models\Profile[] $profiles
 * @property \common\models\Profile $updatedBy
 * @property \common\models\User $user
 * @property \common\models\Setting[] $settings
 * @property \common\models\Subcategory[] $subcategories
 * @property \common\models\Transaction[] $transactions
 * @property \common\models\User[] $users
 * @property \common\models\Warranty[] $warranties
 */
class Profile extends \yii\db\ActiveRecord
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
            'assets',
            'categories',
            'companies',
            'diposals',
            'diposalItems',
            'genMods',
            'genModrefs',
            'genModrefProgresses',
            'genModtypes',
            'genValues',
            'inventories',
            'inventoryItems',
            'jtSubcategories',
            'locations',
            'maintenances',
            'movements',
            'orders',
            'orderItems',
            'personInCharges',
            'status',
            'createdBy',
            'profiles',
            'updatedBy',
            'user',
            'settings',
            'subcategories',
            'transactions',
            'users',
            'warranties'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['name', 'ic_no', 'contact', 'staff_no', 'email', 'remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User'),
            'name' => Yii::t('app', 'Name'),
            'ic_no' => Yii::t('app', 'Ic No'),
            'contact' => Yii::t('app', 'Contact'),
            'staff_no' => Yii::t('app', 'Staff No'),
            'email' => Yii::t('app', 'Email'),
            'remark' => Yii::t('app', 'Remark'),
            'status_id' => Yii::t('app', 'Status'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssets()
    {
        return $this->hasMany(\common\models\Asset::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(\common\models\Category::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(\common\models\Company::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiposals()
    {
        return $this->hasMany(\common\models\Diposal::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiposalItems()
    {
        return $this->hasMany(\common\models\DiposalItem::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenMods()
    {
        return $this->hasMany(\common\models\GenMod::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenModrefs()
    {
        return $this->hasMany(\common\models\GenModref::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenModrefProgresses()
    {
        return $this->hasMany(\common\models\GenModrefProgress::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenModtypes()
    {
        return $this->hasMany(\common\models\GenModtype::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenValues()
    {
        return $this->hasMany(\common\models\GenValue::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventories()
    {
        return $this->hasMany(\common\models\Inventory::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryItems()
    {
        return $this->hasMany(\common\models\InventoryItem::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJtSubcategories()
    {
        return $this->hasMany(\common\models\JtSubcategory::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(\common\models\Location::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaintenances()
    {
        return $this->hasMany(\common\models\Maintenance::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovements()
    {
        return $this->hasMany(\common\models\Movement::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(\common\models\Order::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(\common\models\OrderItem::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonInCharges()
    {
        return $this->hasMany(\common\models\PersonInCharge::className(), ['profile_id' => 'id']);
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
    public function getCreatedBy()
    {
        return $this->hasOne(\common\models\Profile::className(), ['id' => 'created_by']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(\common\models\Profile::className(), ['updated_by' => 'id']);
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
    public function getUser()
    {
        return $this->hasOne(\common\models\User::className(), ['id' => 'user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSettings()
    {
        return $this->hasMany(\common\models\Setting::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategories()
    {
        return $this->hasMany(\common\models\Subcategory::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\common\models\Transaction::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(\common\models\User::className(), ['updated_by' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWarranties()
    {
        return $this->hasMany(\common\models\Warranty::className(), ['updated_by' => 'id']);
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
     * @return \common\models\query\ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\query\ProfileQuery(get_called_class());
        // uncomment and edit permission rule to view own items only
        /*if(\Yii::$app->user->can('permission')){
           $query->mine();
        } */
        // uncomment and edit permission rule to view deleted items
        /*if(\Yii::$app->user->can('see_deleted')){
           return $query;
        } */
        return $query->andWhere(['profile.deleted_by' => 0]);
    }
}
