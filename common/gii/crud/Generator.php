<?php
namespace common\gii\crud;

use mootensai\enhancedgii\crud\Generator as BaseGenerator;
use Yii;
// use yii\db\ActiveRecord;
// use yii\db\ColumnSchema;
// use yii\db\Schema;
// use yii\db\TableSchema;
// use yii\gii\CodeFile;
// use yii\helpers\Inflector;
// use yii\helpers\StringHelper;
// use yii\helpers\VarDumper;
// use yii\web\Controller;

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
    public $enableI18N = true;
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
    public $loggedUserOnly = true;
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
        return 'Custom I/O Generator (CRUD)';
    }

    /**
     * Generates code for Grid View field
     * @param string $attribute
     * @param array $fk
     * @param TableSchema $tableSchema
     * @return string
     */
    public function generateGridViewFieldIndex($attribute, $fk, $tableSchema = null)
    {
        if (is_null($tableSchema)) {
            $tableSchema = $this->getTableSchema();
        }
        if (in_array($attribute, ['status'])) {
            return "['attribute' => '$attribute', 'value' => function($model) {return Html::bsLabel($model['status']);}],\n";
        }
        if (in_array($attribute, $this->hiddenColumns)) {
            return "['attribute' => '$attribute', 'visible' => false],\n";
        }
//        $humanize = Inflector::humanize($attribute, true);
        if ($tableSchema === false || !isset($tableSchema->columns[$attribute])) {
            if (preg_match('/^(password|pass|passwd|passcode)$/i', $attribute)) {
                return "";
            } else {
                return "'$attribute',\n";
            }
        }
        $column = $tableSchema->columns[$attribute];
        $format = $this->generateColumnFormat($column);
//        if($column->autoIncrement){
//            return "";
//        } else
        if (array_key_exists($attribute, $fk) && $attribute) {
            $rel = $fk[$attribute];
            $labelCol = $this->getNameAttributeFK($rel[3]);
            $humanize = Inflector::humanize($rel[3]);
            $id = 'grid-' . Inflector::camel2id(StringHelper::basename($this->searchModelClass)) . '-' . $attribute;
//            $modelRel = $rel[2] ? lcfirst(Inflector::pluralize($rel[1])) : lcfirst($rel[1]);
            if ($column->allowNull)
               { $output = "[
                'attribute' => '$attribute',
                'label' => " . $this->generateString(ucwords(Inflector::humanize($rel[5]))) . ",
                'value' => function(\$model){
                    if (\$model->$rel[7])
                        {return \$model->$rel[7]->$labelCol;}
                    else
                        {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \\yii\\helpers\\ArrayHelper::map(\\$this->nsModel\\$rel[1]::find()->asArray()->all(), '{$rel[self::REL_PRIMARY_KEY]}', '$labelCol'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => '$humanize', 'id' => '$id']
            ],\n";
            return $output;
        }
        else
           { $output = "[
            'attribute' => '$attribute',
            'label' => " . $this->generateString(ucwords(Inflector::humanize($rel[5]))) . ",
            'value' => function(\$model){
                return \$model->$rel[7]->$labelCol;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => \\yii\\helpers\\ArrayHelper::map(\\$this->nsModel\\$rel[1]::find()->asArray()->all(), '{$rel[self::REL_PRIMARY_KEY]}', '$labelCol'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => '$humanize', 'id' => '$id']
        ],\n";
        return $output;
    }
} else {
    return "'$attribute" . ($format === 'text' ? "" : ":" . $format) . "',\n";
}
}

}
