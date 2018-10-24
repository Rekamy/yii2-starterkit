<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\InventoryItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\helpers\Html;
use kartik\export\ExportMenu;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

$this->title = 'Inventory Item';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(500);
	return false;
});";
$this->registerJs($search);
?>
<div class="inventory-item-index">

    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true,
            'visible' => true,
        ],
        ['attribute' => 'id', 'visible' => false],
        'code_no',
        'card_no',
        'serial_no',
        [
                'attribute' => 'checkin_id',
                'label' => 'Checkin',
                'value' => function($model){
                    if ($model->checkin)
                    {return $model->checkin->id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\OrderItem::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Order item', 'id' => 'grid-inventory-item-search-checkin_id']
            ],
        [
                'attribute' => 'checkout_id',
                'label' => 'Checkout',
                'value' => function($model){
                    if ($model->checkout)
                    {return $model->checkout->id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\OrderItem::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Order item', 'id' => 'grid-inventory-item-search-checkout_id']
            ],
        [
                'attribute' => 'supplier_id',
                'label' => 'Supplier',
                'value' => function($model){
                    if ($model->supplier)
                    {return $model->supplier->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid-inventory-item-search-supplier_id']
            ],
        'supplier_code_no',
        [
                'attribute' => 'manufacturer_id',
                'label' => 'Manufacturer',
                'value' => function($model){
                    if ($model->manufacturer)
                    {return $model->manufacturer->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid-inventory-item-search-manufacturer_id']
            ],
        'manufacturer_code_no',
        [
                'attribute' => 'client_id',
                'label' => 'Client',
                'value' => function($model){
                    if ($model->client)
                    {return $model->client->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid-inventory-item-search-client_id']
            ],
        'client_code_no',
        'disposal_item_id',
        'remark',
        [
                'attribute' => 'status_id',
                'label' => 'Status',
                'value' => function($model){
                    if ($model->status)
                    {return $model->status->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Gen value', 'id' => 'grid-inventory-item-search-status_id']
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete} {delete-permanent}',
            'buttons' => [
                'delete-permanent' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-trash" style="color:red"></span>', $url, ['title' => 'Delete Permanent']);
                },
            ],
            'visibleButtons' => [
                'delete-permanent' => \Yii::$app->user->can('admin'),
            ]
        ],
    ];
    ?>
    <?= DynaGrid::widget([
        'columns'=>$gridColumn,
        'storage'=>DynaGrid::TYPE_COOKIE,
        'theme'=>'panel-danger',
        'showPersonalize'=>true,
        'gridOptions'=>[
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'filterSelector' => 'select[name="per-page"]',
            // 'showPageSummary'=>true,
            //'floatHeader'=>true,
            //'responsiveWrap'=>false,
            'pjax' => true,
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-inventory-item']],
            'panel' => [
                'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
                'after' => false,
            ],
            // 'export' => false,
            // your toolbar can include the additional full export menu
            'toolbar' => [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success', 'title'=>'Create Inventory Item']) . ' '.
                    Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button'])
                ],
                ['content'=>'{dynagridFilter}{dynagridSort}{dynagrid}'],
                '{export}',
                '{toggleData}',
                'exportConfig' => [
                    // ExportMenu::FORMAT_PDF => false
                ]
            ],
        ],
        'options'=>['id'=>'dynagrid-1'] // a unique identifier is important
    ]); ?>

</div>
