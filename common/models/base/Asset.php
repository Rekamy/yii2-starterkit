<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the base model class for table "asset".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $subcategory_id
 * @property string $asset_no
 * @property string $description
 * @property integer $supplier_id
 * @property string $supplier_code_no
 * @property integer $manufacturer_id
 * @property string $manufacturer_code_no
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
 * @property \common\models\Category $category
 * @property \common\models\Subcategory $subcategory
 * @property \common\models\GenValue $status
 */
class Asset extends \yii\db\ActiveRecord
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
            'category',
            'subcategory',
            'status'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'subcategory_id', 'supplier_id', 'manufacturer_id', 'disposal_item_id', 'status_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['asset_no', 'description'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['asset_no', 'description', 'supplier_code_no', 'manufacturer_code_no', 'remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asset';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category'),
            'subcategory_id' => Yii::t('app', 'Subcategory'),
            'asset_no' => Yii::t('app', 'Asset No'),
            'description' => Yii::t('app', 'Description'),
            'supplier_id' => Yii::t('app', 'Supplier'),
            'supplier_code_no' => Yii::t('app', 'Supplier Code No'),
            'manufacturer_id' => Yii::t('app', 'Manufacturer'),
            'manufacturer_code_no' => Yii::t('app', 'Manufacturer Code No'),
            'disposal_item_id' => Yii::t('app', 'Disposal Item ID'),
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
    public function getCategory()
    {
        return $this->hasOne(\common\models\Category::className(), ['id' => 'category_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubcategory()
    {
        return $this->hasOne(\common\models\Subcategory::className(), ['id' => 'subcategory_id']);
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
     * @return \common\models\query\AssetQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \common\models\query\AssetQuery(get_called_class());
        // uncomment and edit permission rule to view own items only
        /*if(\Yii::$app->user->can('permission')){
           $query->mine();
        } */
        // uncomment and edit permission rule to view deleted items
        /*if(\Yii::$app->user->can('see_deleted')){
           return $query;
        } */
        return $query->andWhere(['asset.deleted_by' => 0]);
    }
}
