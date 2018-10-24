<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\JtSubcategory */

$this->title = $model->category_id;
$this->params['breadcrumbs'][] = ['label' => 'Jt Subcategory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jt-subcategory-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Jt Subcategory'.' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a('Update', ['update', 'category_id' => $model->category_id, 'subcategory_id' => $model->subcategory_id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'category_id' => $model->category_id, 'subcategory_id' => $model->subcategory_id], [
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
                    <li class="active"><a href="#JtSubcategory" data-toggle="tab"><?= 'Jt Subcategory' ?></a></li>
                    <?php if ($model->createdBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->updatedBy) : ?>
                        <li><a href="#Profile" data-toggle="tab"><?= 'Profile' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->category) : ?>
                        <li><a href="#Category" data-toggle="tab"><?= 'Category' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->subcategory) : ?>
                        <li><a href="#Subcategory" data-toggle="tab"><?= 'Subcategory' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->status) : ?>
                        <li><a href="#GenValue" data-toggle="tab"><?= 'Gen Value' ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="JtSubcategory">
                        <?php 
                        $gridColumn = [
                        [
            'attribute' => 'category.name',
            'label' => 'Category',
        ],
                        [
            'attribute' => 'subcategory.name',
            'label' => 'Subcategory',
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
                        <?php if ($model->category) : ?>
                        <div class="tab-pane" id="Category">
                        <?php 
                        $gridColumnCategory = [
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
                            'model' => $model->category,
                            'attributes' => $gridColumnCategory
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->subcategory) : ?>
                        <div class="tab-pane" id="Subcategory">
                        <?php 
                        $gridColumnSubcategory = [
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
                            'model' => $model->subcategory,
                            'attributes' => $gridColumnSubcategory
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
