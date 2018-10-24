<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Asset */

?>
<div class="asset-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'category.name',
            'label' => 'Category',
        ],
        [
            'attribute' => 'subcategory.name',
            'label' => 'Subcategory',
        ],
        'asset_no',
        'description',
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
