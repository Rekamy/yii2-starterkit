<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\InventoryItem */

?>
<div class="inventory-item-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'code_no',
        'card_no',
        'serial_no',
        [
            'attribute' => 'checkin.id',
            'label' => 'Checkin',
        ],
        [
            'attribute' => 'checkout.id',
            'label' => 'Checkout',
        ],
        [
            'attribute' => 'supplier.name',
            'label' => 'Supplier',
        ],
        'supplier_code_no',
        [
            'attribute' => 'manufacturer.name',
            'label' => 'Manufacturer',
        ],
        'manufacturer_code_no',
        [
            'attribute' => 'client.name',
            'label' => 'Client',
        ],
        'client_code_no',
        'disposal_item_id',
        'remark',
        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
