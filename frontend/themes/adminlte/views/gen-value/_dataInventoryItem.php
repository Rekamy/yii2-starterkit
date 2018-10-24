<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->inventoryItems,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'code_no',
        'card_no',
        'serial_no',
        [
                'attribute' => 'checkin.id',
                'label' => 'Checkin'
            ],
        [
                'attribute' => 'checkout.id',
                'label' => 'Checkout'
            ],
        [
                'attribute' => 'supplier.name',
                'label' => 'Supplier'
            ],
        'supplier_code_no',
        [
                'attribute' => 'manufacturer.name',
                'label' => 'Manufacturer'
            ],
        'manufacturer_code_no',
        [
                'attribute' => 'client.name',
                'label' => 'Client'
            ],
        'client_code_no',
        'disposal_item_id',
        'remark',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'inventory-item'
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
