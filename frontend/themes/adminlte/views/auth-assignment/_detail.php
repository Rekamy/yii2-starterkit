<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */

?>
<div class="auth-assignment-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->item_name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'itemName.name',
            'label' => 'Item Name',
        ],
        'user_id',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
