<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */

$this->title = $model->item_name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Assignment', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-assignment-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Auth Assignment'.' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a('Update', ['update', 'item_name' => $model->item_name, 'user_id' => $model->user_id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'item_name' => $model->item_name, 'user_id' => $model->user_id], [
                    'class' => 'btn btn-sm btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="box-body">

            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#AuthAssignment" data-toggle="tab"><?= 'Auth Assignment' ?></a></li>
                    <?php if ($model->itemName) : ?>
                        <li><a href="#AuthItem" data-toggle="tab"><?= 'Auth Item' ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="AuthAssignment">
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
                        <?php if ($model->itemName) : ?>
                        <div class="tab-pane" id="AuthItem">
                        <?php 
                        $gridColumnAuthItem = [
                        'name',
                        'type',
                        'description',
                        'rule_name',
                        'data',
                        ];
                        echo DetailView::widget([
                            'model' => $model->itemName,
                            'attributes' => $gridColumnAuthItem
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
