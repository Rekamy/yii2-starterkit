<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Company'.' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <li><a href="#Asset" data-toggle="tab"><?= 'Asset' ?></a></li>
                    <?php if ($model->createdBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->updatedBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->status) : ?>
                        <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <?php endif; ?>
                    <li><a href="#InventoryItem" data-toggle="tab"><?= 'Inventory Item' ?></a></li>
                    <li><a href="#Location" data-toggle="tab"><?= 'Location' ?></a></li>
                    <li><a href="#Order" data-toggle="tab"><?= 'Order' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Company">
                        <?php 
                        $gridColumn = [
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
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                    ?>
                    </div>

                    <div class="tab-pane" id="Asset">
<?php
                    if($providerAsset->totalCount){
                        $gridColumnAsset = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            [
                'attribute' => 'category.name',
                'label' => 'Category'
            ],
                            [
                'attribute' => 'subcategory.name',
                'label' => 'Subcategory'
            ],
                            'asset_no',
                            'description',
                                                        'supplier_code_no',
                                                        'manufacturer_code_no',
                            'disposal_item_id',
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerAsset,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-asset']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Asset'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnAsset
                        ]);
}
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

                    <div class="tab-pane" id="InventoryItem">
<?php
                    if($providerInventoryItem->totalCount){
                        $gridColumnInventoryItem = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code_no',
                            'card_no',
                            'serial_no',
                            [
                'attribute' => 'checkin.id',
                'label' => 'Checkin'
            ],
                            [
                'attribute' => 'checkout.id',
                'label' => 'Checkout'
            ],
                                                        'supplier_code_no',
                                                        'manufacturer_code_no',
                                                        'client_code_no',
                            'disposal_item_id',
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerInventoryItem,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-inventory-item']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Inventory Item'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnInventoryItem
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Location">
<?php
                    if($providerLocation->totalCount){
                        $gridColumnLocation = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                                                        'name',
                            'address',
                            'city',
                            'poscode',
                            'state',
                            'country',
                            'contact',
                            'fax',
                            'email:email',
                            'email_secondary:email',
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerLocation,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-location']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Location'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnLocation
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Order">
<?php
                    if($providerOrder->totalCount){
                        $gridColumnOrder = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            [
                'attribute' => 'transaction.id',
                'label' => 'Transaction'
            ],
                            'order_no',
                            'order_date',
                            'attend_date',
                            [
                'attribute' => 'type.name',
                'label' => 'Type'
            ],
                                                                                    [
                'attribute' => 'orderBy.name',
                'label' => 'Order By'
            ],
                            [
                'attribute' => 'attendBy.name',
                'label' => 'Attend By'
            ],
                            'approved_at',
                            [
                'attribute' => 'approvedBy.name',
                'label' => 'Approved By'
            ],
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerOrder,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Order'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnOrder
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
