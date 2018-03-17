<?php
namespace common\gii\crud;

use mootensai\enhancedgii\crud\Generator as BaseGenerator;
use Yii;
use yii\db\ActiveRecord;
use yii\db\ColumnSchema;
use yii\db\Schema;
use yii\db\TableSchema;
use yii\gii\CodeFile;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Generates Relational CRUD
 *
 *
 * @author Yohanes Candrajaya <moo.tensai@gmail.com>
 * @since 2.0
 */
class Generator extends BaseGenerator
{

    public $nameAttribute = 'name, title, username';
    public $hiddenColumns = 'id, lock';
    public $skippedColumns = 'created_at, updated_at, created_by, updated_by, deleted_at, deleted_by, created, modified, deleted, approved_at, approved_by, check_by';
    public $nsModel = 'common\models';
    public $nsSearchModel = 'common\models\search';
    public $generateSearchModel = true;
    public $searchModelClass;
    public $generateQuery = true;
    public $queryNs = 'common\models\query';
    public $queryClass;
    public $queryBaseClass = 'yii\db\ActiveQuery';
    public $generateLabelsFromComments = false;
    public $useTablePrefix = false;
    public $generateRelations = true;
    public $generateMigrations = true;
    public $optimisticLock;
    public $createdAt = 'created_at';
    public $updatedAt = 'updated_at';
    public $timestampValue = "new \\yii\\db\\Expression('CURRENT_TIMESTAMP')";
    // public $timestampValue = "date('Y-m-d H:i:s a')')";
    public $createdBy = 'created_by';
    public $updatedBy = 'updated_by';
    public $blameableValue = '\Yii::\$app->user->id';
    public $UUIDColumn = 'id';
    public $deletedBy = 'deleted_by';
    public $deletedAt = 'deleted_at';
    public $nsController = 'frontend\controllers';
    public $controllerClass;
    public $pluralize;
    public $loggedUserOnly;
    public $expandable = true;
    public $cancelable = true;
    public $saveAsNew;
    public $pdf;
    // public $viewPath = '@app/views';
    public $viewPath = '@frontend/themes/adminlte/views';
    public $baseControllerClass = 'yii\web\Controller';
    public $indexWidgetType = 'grid';
    public $relations;


    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Custom2 I/O Generator (CRUD)';
    }


}
