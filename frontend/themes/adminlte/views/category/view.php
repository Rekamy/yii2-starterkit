<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Category', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Category'.' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#Category" data-toggle="tab"><?= 'Category' ?></a></li>
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
                    <li><a href="#Inventory" data-toggle="tab"><?= 'Inventory' ?></a></li>
                    <li><a href="#JtSubcategory" data-toggle="tab"><?= 'Jt Subcategory' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Category">
                        <?php 
                        $gridColumn = [
                        ['attribute' => 'id', 'visible' => false],
                        'name',
                        'description',
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
                'attribute' => 'subcategory.name',
                'label' => 'Subcategory'
            ],
                            'asset_no',
                            'description',
                            [
                'attribute' => 'supplier.name',
                'label' => 'Supplier'
            ],
                            'supplier_code_no',
                            [
                'attribute' => 'manufacturer.name',
                'label' => 'Manufacturer'
            ],
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

                    <div class="tab-pane" id="Inventory">
<?php
                    if($providerInventory->totalCount){
                        $gridColumnInventory = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code_no',
                            'card_no',
                                                        [
                'attribute' => 'subcategory.name',
                'label' => 'Subcategory'
            ],
                            'description',
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerInventory,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-inventory']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Inventory'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnInventory
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="JtSubcategory">
<?php
                    if($providerJtSubcategory->totalCount){
                        $gridColumnJtSubcategory = [
                            ['class' => 'yii\grid\SerialColumn'],
                                                        [
                'attribute' => 'subcategory.name',
                'label' => 'Subcategory'
            ],
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerJtSubcategory,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-jt-subcategory']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Jt Subcategory'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnJtSubcategory
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
