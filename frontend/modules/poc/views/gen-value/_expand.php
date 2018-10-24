<?php
use kartik\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('GenValue'),
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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Category'),
        'content' => $this->render('_dataCategory', [
            'model' => $model,
            'row' => $model->categories,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Company'),
        'content' => $this->render('_dataCompany', [
            'model' => $model,
            'row' => $model->companies,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Diposal'),
        'content' => $this->render('_dataDiposal', [
            'model' => $model,
            'row' => $model->diposals,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Diposal Item'),
        'content' => $this->render('_dataDiposalItem', [
            'model' => $model,
            'row' => $model->diposalItems,
        ]),
    ],
                    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Inventory'),
        'content' => $this->render('_dataInventory', [
            'model' => $model,
            'row' => $model->inventories,
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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Jt Subcategory'),
        'content' => $this->render('_dataJtSubcategory', [
            'model' => $model,
            'row' => $model->jtSubcategories,
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
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Maintenance'),
        'content' => $this->render('_dataMaintenance', [
            'model' => $model,
            'row' => $model->maintenances,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Movement'),
        'content' => $this->render('_dataMovement', [
            'model' => $model,
            'row' => $model->movements,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Order'),
        'content' => $this->render('_dataOrder', [
            'model' => $model,
            'row' => $model->orders,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Order Item'),
        'content' => $this->render('_dataOrderItem', [
            'model' => $model,
            'row' => $model->orderItems,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Person In Charge'),
        'content' => $this->render('_dataPersonInCharge', [
            'model' => $model,
            'row' => $model->personInCharges,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Profile'),
        'content' => $this->render('_dataProfile', [
            'model' => $model,
            'row' => $model->profiles,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Setting'),
        'content' => $this->render('_dataSetting', [
            'model' => $model,
            'row' => $model->settings,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Subcategory'),
        'content' => $this->render('_dataSubcategory', [
            'model' => $model,
            'row' => $model->subcategories,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Transaction'),
        'content' => $this->render('_dataTransaction', [
            'model' => $model,
            'row' => $model->transactions,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('User'),
        'content' => $this->render('_dataUser', [
            'model' => $model,
            'row' => $model->users,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Warranty'),
        'content' => $this->render('_dataWarranty', [
            'model' => $model,
            'row' => $model->warranties,
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
