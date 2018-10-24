<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\InventoryItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-item-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Inventory Item'.' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
                    <li class="active"><a href="#InventoryItem" data-toggle="tab"><?= 'Inventory Item' ?></a></li>
                    <?php if ($model->createdBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->updatedBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->supplier) : ?>
                        <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->manufacturer) : ?>
                        <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->client) : ?>
                        <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->checkin) : ?>
                        <li><a href="#OrderItem" data-toggle="tab"><?= 'Order Item' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->checkout) : ?>
                        <li><a href="#OrderItem" data-toggle="tab"><?= 'Order Item' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->status) : ?>
                        <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="InventoryItem">
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
                        <?php if ($model->createdBy) : ?>
                        <div class="tab-pane" id="Profile">
                        <?php 
                        $gridColumnProfile = [
                        ['attribute' => 'id', 'visible' => false],
                        'user_id',
                        'name',
                        'ic_no',
                        'contact',
                        'staff_no',
                        'email',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->createdBy,
                            'attributes' => $gridColumnProfile
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->updatedBy) : ?>
                        <div class="tab-pane" id="Profile">
                        <?php 
                        $gridColumnProfile = [
                        ['attribute' => 'id', 'visible' => false],
                        'user_id',
                        'name',
                        'ic_no',
                        'contact',
                        'staff_no',
                        'email',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->updatedBy,
                            'attributes' => $gridColumnProfile
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->supplier) : ?>
                        <div class="tab-pane" id="Company">
                        <?php 
                        $gridColumnCompany = [
                        ['attribute' => 'id', 'visible' => false],
                        'code',
                        'name',
                        'logo',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->supplier,
                            'attributes' => $gridColumnCompany
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->manufacturer) : ?>
                        <div class="tab-pane" id="Company">
                        <?php 
                        $gridColumnCompany = [
                        ['attribute' => 'id', 'visible' => false],
                        'code',
                        'name',
                        'logo',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->manufacturer,
                            'attributes' => $gridColumnCompany
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->client) : ?>
                        <div class="tab-pane" id="Company">
                        <?php 
                        $gridColumnCompany = [
                        ['attribute' => 'id', 'visible' => false],
                        'code',
                        'name',
                        'logo',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->client,
                            'attributes' => $gridColumnCompany
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->checkin) : ?>
                        <div class="tab-pane" id="OrderItem">
                        <?php 
                        $gridColumnOrderItem = [
                        ['attribute' => 'id', 'visible' => false],
                        'type_id',
                        'order_id',
                        'item_id',
                        'rq_quantity',
                        'app_quantity',
                        'approved_at',
                        'approved_by',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->checkin,
                            'attributes' => $gridColumnOrderItem
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->checkout) : ?>
                        <div class="tab-pane" id="OrderItem">
                        <?php 
                        $gridColumnOrderItem = [
                        ['attribute' => 'id', 'visible' => false],
                        'type_id',
                        'order_id',
                        'item_id',
                        'rq_quantity',
                        'app_quantity',
                        'approved_at',
                        'approved_by',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->checkout,
                            'attributes' => $gridColumnOrderItem
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->status) : ?>
                        <div class="tab-pane" id="GenValue">
                        <?php 
                        $gridColumnGenValue = [
                        ['attribute' => 'id', 'visible' => false],
                        'code',
                        'name',
                        'description',
                        'remark',
                        ];
                        echo DetailView::widget([
                            'model' => $model->status,
                            'attributes' => $gridColumnGenValue
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
