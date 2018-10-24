<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->diposalItems,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'disposal_id',
        'item_id',
        'order_no',
        'order_date',
        'attend_date',
        [
                'attribute' => 'type.name',
                'label' => 'Type'
            ],
        [
                'attribute' => 'reason.name',
                'label' => 'Reason'
            ],
        [
                'attribute' => 'method.name',
                'label' => 'Method'
            ],
                        'approved_at',
                'remark',
        [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'diposal-item'
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
