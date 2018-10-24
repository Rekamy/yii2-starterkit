<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->inventories,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'code_no',
        'card_no',
        [
                'attribute' => 'category.name',
                'label' => 'Category'
            ],
        [
                'attribute' => 'subcategory.name',
                'label' => 'Subcategory'
            ],
        'remark',
        [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'inventory'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
