<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Order'.' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#Order" data-toggle="tab"><?= 'Order' ?></a></li>
                    <?php if ($model->seller) : ?>
                        <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->type) : ?>
                        <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->status) : ?>
                        <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->buyyer) : ?>
                        <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->orderBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->attendBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->approvedBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->createdBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->updatedBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->transaction) : ?>
                        <li><a href="#Transaction" data-toggle="tab"><?= 'Transaction' ?></a></li>
                    <?php endif; ?>
                    <li><a href="#OrderItem" data-toggle="tab"><?= 'Order Item' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Order">
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
                        <?php if ($model->seller) : ?>
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
                            'model' => $model->seller,
                            'attributes' => $gridColumnCompany
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->type) : ?>
                        <div class="tab-pane" id="GenValue">
                        <?php 
                        $gridColumnGenValue = [
                        ['attribute' => 'id', 'visible' => false],
                        'code',
                        'name',
                        'description',
                        'remark',
                        [
            'attribute' => 'profiles.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->type,
                            'attributes' => $gridColumnGenValue
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
                        <?php if ($model->buyyer) : ?>
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
                            'model' => $model->buyyer,
                            'attributes' => $gridColumnCompany
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->orderBy) : ?>
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
                            'model' => $model->orderBy,
                            'attributes' => $gridColumnProfile
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->attendBy) : ?>
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
                            'model' => $model->attendBy,
                            'attributes' => $gridColumnProfile
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->approvedBy) : ?>
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
                            'model' => $model->approvedBy,
                            'attributes' => $gridColumnProfile
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
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
                        <?php if ($model->transaction) : ?>
                        <div class="tab-pane" id="Transaction">
                        <?php 
                        $gridColumnTransaction = [
                        ['attribute' => 'id', 'visible' => false],
                        'type',
                        'date',
                        'remark',
                        [
            'attribute' => 'status.name',
            'label' => 'Status',
        ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->transaction,
                            'attributes' => $gridColumnTransaction
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane" id="OrderItem">
<?php
                    if($providerOrderItem->totalCount){
                        $gridColumnOrderItem = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            [
                'attribute' => 'type.name',
                'label' => 'Type'
            ],
                                                        'item_id',
                            'rq_quantity',
                            'app_quantity',
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
                            'dataProvider' => $providerOrderItem,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order-item']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Order Item'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnOrderItem
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
