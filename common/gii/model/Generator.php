<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\gii\model;

use mootensai\enhancedgii\model\Generator as BaseGenerator;
use Yii;
// use yii\base\NotSupportedException;
// use yii\db\Schema;
// use yii\db\TableSchema;
// use yii\db\ActiveQuery;
// use yii\gii\CodeFile;
// use yii\helpers\Inflector;

/**
 * Generates CRUD
 *
 * @property array $columnNames Model column names. This property is read-only.
 * @property string $controllerID The controller ID (without the module ID prefix). This property is
 * read-only.
 * @property array $searchAttributes Searchable attributes. This property is read-only.
 * @property string $viewPath The controller view path. This property is read-only.
 * @property TableSchema $tableSchema The TableSchema of this model.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends BaseGenerator {
    /* @var $tableSchema TableSchema */

    public $nsModel = 'common\models';
    public $nameAttribute = 'name, title, username';
    public $hiddenColumns = 'id, lock';
    public $skippedColumns = 'created_at, updated_at, created_by, updated_by, deleted_at, deleted_by, created, modified, deleted';
    public $enableI18N = true;
    public $generateQuery = true;
    public $queryNs = 'common\models\query';
    public $queryClass;
    public $queryBaseClass = 'yii\db\ActiveQuery';
    public $generateLabelsFromComments = false;
    public $useTablePrefix = false;
    public $generateRelations = self::RELATIONS_ALL;
    public $generateAttributeHints = false;
    public $generateMigrations = false;
    public $optimisticLock;
    public $createdAt = 'created_at';
    public $updatedAt = 'updated_at';
    public $timestampValue = "new \\yii\\db\\Expression('CURRENT_TIMESTAMP')";
    // public $timestampValue = "date('Y-m-d H:i:s a')";
    public $createdBy = 'created_by';
    public $updatedBy = 'updated_by';
    public $blameableValue = '\Yii::$app->user->id';
    public $deletedBy = 'deleted_by';
    public $deletedByValue = '\Yii::$app->user->id';
    public $deletedByValueRestored = '0';
    public $deletedAt = 'deleted_at';
    public $deletedAtValue = "new \\yii\\db\\Expression('CURRENT_TIMESTAMP')";
    public $deletedAtValueRestored = "new \\yii\\db\\Expression('CURRENT_TIMESTAMP')";
    public $generateBaseOnly = false;
    public $UUIDColumn;
    public $isTree;

    /**
     * @inheritdoc
     */
    public function getName() {
        return 'Custom I/O Generator (Model)';
    }


}
