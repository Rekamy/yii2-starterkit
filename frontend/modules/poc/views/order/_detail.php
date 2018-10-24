<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

?>
<div class="order-view">

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
            'attribute' => 'transaction.id',
            'label' => 'Transaction',
        ],
        'order_no',
        'order_date',
        'attend_date',
        [
            'attribute' => 'type.name',
            'label' => 'Type',
        ],
        [
            'attribute' => 'seller.name',
            'label' => 'Seller',
        ],
        [
            'attribute' => 'buyyer.name',
            'label' => 'Buyyer',
        ],
        [
            'attribute' => 'orderBy.name',
            'label' => 'Order By',
        ],
        [
            'attribute' => 'attendBy.name',
            'label' => 'Attend By',
        ],
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
