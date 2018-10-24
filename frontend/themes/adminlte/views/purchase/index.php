<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\PurchaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\helpers\Html;
use kartik\export\ExportMenu;
use kartik\dynagrid\DynaGrid;
use kartik\grid\GridView;

$this->title = 'Purchase';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="purchase-index">

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
        'purchase_no',
        'purchase_date',
        'company_id',
        'remark',
        [
            'attribute' => 'status',
            'format' => 'raw',
            'value' => function($model) {
                switch ($model['status']) {
                    case 1:
                    return \kartik\helpers\Html::bsLabel('Active','success');
                    break;

                    default:
                    return \kartik\helpers\Html::bsLabel('Inactive','danger');
                    break;
                }
            }
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
            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-purchase']],
            'panel' => [
                'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                'before' =>  '<div style="padding-top: 7px;"><em>* The table header sticks to the top in this demo as you scroll</em></div>',
                'after' => false,
            ],
            // 'export' => false,
            // your toolbar can include the additional full export menu
            'toolbar' => [
                ['content'=>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success', 'title'=>'Create Purchase']) . ' '.
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
