<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Location */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Location', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Location'.' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#Location" data-toggle="tab"><?= 'Location' ?></a></li>
                    <?php if ($model->createdBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->updatedBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->company) : ?>
                        <li><a href="#Company" data-toggle="tab"><?= 'Company' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->status) : ?>
                        <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <?php endif; ?>
                    <li><a href="#PersonInCharge" data-toggle="tab"><?= 'Person In Charge' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Location">
                        <?php 
                        $gridColumn = [
                        ['attribute' => 'id', 'visible' => false],
                        'code',
                        [
            'attribute' => 'company.name',
            'label' => 'Company',
        ],
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
                        'email:email',
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
                        'email:email',
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
                        <?php if ($model->company) : ?>
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
                            'model' => $model->company,
                            'attributes' => $gridColumnCompany
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

                    <div class="tab-pane" id="PersonInCharge">
<?php
                    if($providerPersonInCharge->totalCount){
                        $gridColumnPersonInCharge = [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'id', 'visible' => false],
                                                        [
                'attribute' => 'profile.name',
                'label' => 'Profile'
            ],
                            'remark',
                            [
                'attribute' => 'status.name',
                'label' => 'Status'
            ],
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerPersonInCharge,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-person-in-charge']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Person In Charge'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnPersonInCharge
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
