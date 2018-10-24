<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

?>
<div class="order-item-view">

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
            'attribute' => 'type.name',
            'label' => 'Type',
        ],
        [
            'attribute' => 'order.id',
            'label' => 'Order',
        ],
        'item_id',
        'rq_quantity',
        'app_quantity',
        'approved_at',
        [
            'attribute' => 'approvedBy.name',
            'label' => 'Approved By',
        ],
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
