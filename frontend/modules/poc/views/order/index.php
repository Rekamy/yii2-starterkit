<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\helpers\Html;
use kartik\export\ExportMenu;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

$this->title = 'Order';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(500);
	return false;
});";
$this->registerJs($search);
?>
<div class="order-index">

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
        [
                'attribute' => 'transaction_id',
                'label' => 'Transaction',
                'value' => function($model){
                    if ($model->transaction)
                    {return $model->transaction->id;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Transaction::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Transaction', 'id' => 'grid-order-search-transaction_id']
            ],
        'order_no',
        'order_date',
        'attend_date',
        [
                'attribute' => 'type_id',
                'label' => 'Type',
                'value' => function($model){
                    if ($model->type)
                    {return $model->type->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Gen value', 'id' => 'grid-order-search-type_id']
            ],
        [
                'attribute' => 'seller_id',
                'label' => 'Seller',
                'value' => function($model){
                    if ($model->seller)
                    {return $model->seller->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid-order-search-seller_id']
            ],
        [
                'attribute' => 'buyyer_id',
                'label' => 'Buyyer',
                'value' => function($model){
                    if ($model->buyyer)
                    {return $model->buyyer->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Company', 'id' => 'grid-order-search-buyyer_id']
            ],
        [
                'attribute' => 'order_by',
                'label' => 'Order By',
                'value' => function($model){
                    if ($model->orderBy)
                    {return $model->orderBy->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Profile', 'id' => 'grid-order-search-order_by']
            ],
        [
                'attribute' => 'attend_by',
                'label' => 'Attend By',
                'value' => function($model){
                    if ($model->attendBy)
                    {return $model->attendBy->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Profile', 'id' => 'grid-order-search-attend_by']
            ],
        'approved_at',
        [
                'attribute' => 'approved_by',
                'label' => 'Approved By',
                'value' => function($model){
                    if ($model->approvedBy)
                    {return $model->approvedBy->name;}
                    else
                    {return NULL;}
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->asArray()->all(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Profile', 'id' => 'grid-order-search-approved_by']
            ],
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
                'filterInputOptions' => ['placeholder' => 'Gen value', 'id' => 'grid-order-search-status_id']
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
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order']],
            'panel' => [
                'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
                'after' => false,
            ],
            // 'export' => false,
            // your toolbar can include the additional full export menu
            'toolbar' => [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success', 'title'=>'Create Order']) . ' '.
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
