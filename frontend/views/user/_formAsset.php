<div class="form-group" id="add-asset">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use kartik\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Asset',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'columnOptions' => ['hidden'=>true]],
        'category' => ['type' => TabularForm::INPUT_TEXT],
        'subcategory' => ['type' => TabularForm::INPUT_TEXT],
        'asset_no' => ['type' => TabularForm::INPUT_TEXT],
        'supplier_id' => ['type' => TabularForm::INPUT_TEXT],
        'supplier_code_no' => ['type' => TabularForm::INPUT_TEXT],
        'manufacturer_id' => ['type' => TabularForm::INPUT_TEXT],
        'manufacturer_code_no' => ['type' => TabularForm::INPUT_TEXT],
        'client_id' => ['type' => TabularForm::INPUT_TEXT],
        'client_code_no' => ['type' => TabularForm::INPUT_TEXT],
        'remark' => ['type' => TabularForm::INPUT_TEXT],
        'status' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => [1 => 'Active', 0 => 'Inactive'],
                'options' => ['placeholder' => 'Choose Status',],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ],
            'columnOptions' => ['width' => '200px'],
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowAsset(' . $key . '); return false;', 'id' => 'asset-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Asset', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAsset()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

