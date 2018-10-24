<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->diposals,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'transaction.id',
                'label' => 'Transaction'
            ],
        'order_no',
        'order_date',
        'attend_date',
        [
                'attribute' => 'type.name',
                'label' => 'Type'
            ],
                        'approved_at',
                'disposed_at',
                'remark',
        [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'diposal'
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
