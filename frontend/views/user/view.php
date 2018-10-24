<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'User'.' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#User" data-toggle="tab"><?= 'User' ?></a></li>
                    <li><a href="#Asset" data-toggle="tab"><?= 'Asset' ?></a></li>
                    <li><a href="#Branch" data-toggle="tab"><?= 'Branch' ?></a></li>
                    <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <li><a href="#CompanyPic" data-toggle="tab"><?= 'Company Pic' ?></a></li>
                    <li><a href="#GenMod" data-toggle="tab"><?= 'Gen Mod' ?></a></li>
                    <li><a href="#GenModref" data-toggle="tab"><?= 'Gen Modref' ?></a></li>
                    <li><a href="#GenModrefProgress" data-toggle="tab"><?= 'Gen Modref Progress' ?></a></li>
                    <li><a href="#GenModtype" data-toggle="tab"><?= 'Gen Modtype' ?></a></li>
                    <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <li><a href="#Inventory" data-toggle="tab"><?= 'Inventory' ?></a></li>
                    <li><a href="#InventoryItem" data-toggle="tab"><?= 'Inventory Item' ?></a></li>
                    <li><a href="#Location" data-toggle="tab"><?= 'Location' ?></a></li>
                    <li><a href="#Maintenance" data-toggle="tab"><?= 'Maintenance' ?></a></li>
                    <li><a href="#Movement" data-toggle="tab"><?= 'Movement' ?></a></li>
                    <li><a href="#Order" data-toggle="tab"><?= 'Order' ?></a></li>
                    <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <li><a href="#Purchase" data-toggle="tab"><?= 'Purchase' ?></a></li>
                    <li><a href="#Setting" data-toggle="tab"><?= 'Setting' ?></a></li>
                    <?php if ($model->createdBy) : ?>
                        <li><a href="#User" data-toggle="tab"><?= 'User' ?></a></li>
                    <?php endif; ?>
                    <li><a href="#User" data-toggle="tab"><?= 'User' ?></a></li>
                    <?php if ($model->updatedBy) : ?>
                        <li><a href="#User" data-toggle="tab"><?= 'User' ?></a></li>
                    <?php endif; ?>
                    <li><a href="#Warranty" data-toggle="tab"><?= 'Warranty' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="User">
                        <?php 
                        $gridColumn = [
                        ['attribute' => 'id', 'visible' => false],
                        'username',
                        'auth_key',
                        'password_hash',
                        'password_reset_token',
                        'email:email',
                        'remark',
                        [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
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
                            'category',
                            'subcategory',
                            'asset_no',
                            'supplier_id',
                            'supplier_code_no',
                            'manufacturer_id',
                            'manufacturer_code_no',
                            'client_id',
                            'client_code_no',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
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

                    <div class="tab-pane" id="Branch">
<?php
                    if($providerBranch->totalCount){
                        $gridColumnBranch = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                            'company_id',
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
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerBranch,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-branch']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Branch'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnBranch
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Company">
<?php
                    if($providerCompany->totalCount){
                        $gridColumnCompany = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                            'name',
                            'logo',
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
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerCompany,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-company']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Company'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnCompany
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="CompanyPic">
<?php
                    if($providerCompanyPic->totalCount){
                        $gridColumnCompanyPic = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'company_id',
                            'branch_id',
                            'profile_id',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerCompanyPic,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-company-pic']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Company Pic'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnCompanyPic
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="GenMod">
<?php
                    if($providerGenMod->totalCount){
                        $gridColumnGenMod = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                            'name',
                            'description',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerGenMod,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gen-mod']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Gen Mod'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnGenMod
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="GenModref">
<?php
                    if($providerGenModref->totalCount){
                        $gridColumnGenModref = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                            'gen_mod_id',
                            'gen_modtype_id',
                            'name',
                            'description',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerGenModref,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gen-modref']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Gen Modref'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnGenModref
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="GenModrefProgress">
<?php
                    if($providerGenModrefProgress->totalCount){
                        $gridColumnGenModrefProgress = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                            'next',
                            'return',
                            'description',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerGenModrefProgress,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gen-modref-progress']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Gen Modref Progress'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnGenModrefProgress
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="GenModtype">
<?php
                    if($providerGenModtype->totalCount){
                        $gridColumnGenModtype = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code',
                            'name',
                            'description',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerGenModtype,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gen-modtype']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Gen Modtype'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnGenModtype
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="GenValue">
<?php
                    if($providerGenValue->totalCount){
                        $gridColumnGenValue = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'gen_modref_code',
                            'name',
                            'description',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerGenValue,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-gen-value']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Gen Value'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnGenValue
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Inventory">
<?php
                    if($providerInventory->totalCount){
                        $gridColumnInventory = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'code_no',
                            'card_no',
                            'category',
                            'subcategory',
                            'supplier_id',
                            'supplier_code_no',
                            'manufacturer_id',
                            'manufacturer_code_no',
                            'client_id',
                            'client_code_no',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
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

                    <div class="tab-pane" id="InventoryItem">
<?php
                    if($providerInventoryItem->totalCount){
                        $gridColumnInventoryItem = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'order_id',
                            'code_no',
                            'card_no',
                            'serial_no',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
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
                            'company_id',
                            'branch_id',
                            'name',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
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

                    <div class="tab-pane" id="Maintenance">
<?php
                    if($providerMaintenance->totalCount){
                        $gridColumnMaintenance = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'asset_id',
                            'type',
                            'date',
                            'supplier_id',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerMaintenance,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-maintenance']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Maintenance'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnMaintenance
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Movement">
<?php
                    if($providerMovement->totalCount){
                        $gridColumnMovement = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'asset_id',
                            'type',
                            'date',
                            'from',
                            'to',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerMovement,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-movement']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Movement'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnMovement
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
                            'order_no',
                            'order_date',
                            'type',
                            'company_id',
                            'approved_at',
                                                        'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
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

                    <div class="tab-pane" id="Profile">
<?php
                    if($providerProfile->totalCount){
                        $gridColumnProfile = [
                            ['class' => 'yii\grid\SerialColumn'],
                            'user_id',
                            'name',
                            'ic_no',
                            'contact',
                            'staff_no',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerProfile,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-profile']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Profile'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnProfile
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Purchase">
<?php
                    if($providerPurchase->totalCount){
                        $gridColumnPurchase = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'purchase_no',
                            'purchase_date',
                            'company_id',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerPurchase,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-purchase']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Purchase'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnPurchase
                        ]);
}
                        ?>

                        </div>

                    <div class="tab-pane" id="Setting">
<?php
                    if($providerSetting->totalCount){
                        $gridColumnSetting = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'label',
                            'description',
                            'key',
                            'value',
                            'start_date',
                            'end_date',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerSetting,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-setting']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Setting'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnSetting
                        ]);
}
                        ?>

                        </div>
                        <?php if ($model->createdBy) : ?>
                        <div class="tab-pane" id="User">
                        <?php 
                        $gridColumnUser = [
                        ['attribute' => 'id', 'visible' => false],
                        'username',
                        'auth_key',
                        'password_hash',
                        'password_reset_token',
                        'email:email',
                        'remark',
                        [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->createdBy,
                            'attributes' => $gridColumnUser
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane" id="User">
<?php
                    if($providerUser->totalCount){
                        $gridColumnUser = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'username',
                            'auth_key',
                            'password_hash',
                            'password_reset_token',
                            'email:email',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerUser,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('User'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnUser
                        ]);
}
                        ?>

                        </div>
                        <?php if ($model->updatedBy) : ?>
                        <div class="tab-pane" id="User">
                        <?php 
                        $gridColumnUser = [
                        ['attribute' => 'id', 'visible' => false],
                        'username',
                        'auth_key',
                        'password_hash',
                        'password_reset_token',
                        'email:email',
                        'remark',
                        [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo DetailView::widget([
                            'model' => $model->updatedBy,
                            'attributes' => $gridColumnUser
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane" id="Warranty">
<?php
                    if($providerWarranty->totalCount){
                        $gridColumnWarranty = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                            'asset_id',
                            'supplier_id',
                            'type',
                            'start_date',
                            'end_date',
                            'remark',
                            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($model) {
                    switch($model['status']) {
                        case 1:
                        return \kartik\helpers\Html::bsLabel('Active','success');
                        break;
                        default:
                        return \kartik\helpers\Html::bsLabel('Inactive','danger');
                        break;
                    }
                },
                'visible' => true,
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerWarranty,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-warranty']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Warranty'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnWarranty
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
