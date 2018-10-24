<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\DiposalItem */

?>
<div class="diposal-item-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'disposal_id',
        'item_id',
        'order_no',
        'order_date',
        'attend_date',
        [
            'attribute' => 'type.name',
            'label' => 'Type',
        ],
        [
            'attribute' => 'reason.name',
            'label' => 'Reason',
        ],
        [
            'attribute' => 'method.name',
            'label' => 'Method',
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
