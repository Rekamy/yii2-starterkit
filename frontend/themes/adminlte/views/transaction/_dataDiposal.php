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
        'order_no',
        'order_date',
        'attend_date',
        [
                'attribute' => 'type.name',
                'label' => 'Type'
            ],
        [
                'attribute' => 'orderBy.name',
                'label' => 'Order By'
            ],
        [
                'attribute' => 'attendBy.name',
                'label' => 'Attend By'
            ],
        'approved_at',
        [
                'attribute' => 'approvedBy.name',
                'label' => 'Approved By'
            ],
        'disposed_at',
        [
                'attribute' => 'disposedBy.name',
                'label' => 'Disposed By'
            ],
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
