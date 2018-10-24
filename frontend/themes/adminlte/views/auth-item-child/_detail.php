<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItemChild */

?>
<div class="auth-item-child-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->parent) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'parent0.name',
            'label' => 'Parent',
        ],
        [
            'attribute' => 'child0.name',
            'label' => 'Child',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
