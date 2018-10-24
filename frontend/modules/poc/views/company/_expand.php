<?php
use kartik\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Company'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Asset'),
        'content' => $this->render('_dataAsset', [
            'model' => $model,
            'row' => $model->assets,
        ]),
    ],
                        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Inventory Item'),
        'content' => $this->render('_dataInventoryItem', [
            'model' => $model,
            'row' => $model->inventoryItems,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Location'),
        'content' => $this->render('_dataLocation', [
            'model' => $model,
            'row' => $model->locations,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Order'),
        'content' => $this->render('_dataOrder', [
            'model' => $model,
            'row' => $model->orders,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
