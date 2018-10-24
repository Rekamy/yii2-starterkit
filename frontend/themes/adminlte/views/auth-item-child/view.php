<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItemChild */

$this->title = $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Auth Item Child', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-child-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Auth Item Child'.' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a('Update', ['update', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'parent' => $model->parent, 'child' => $model->child], [
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
                    <li class="active"><a href="#AuthItemChild" data-toggle="tab"><?= 'Auth Item Child' ?></a></li>
                    <?php if ($model->parent0) : ?>
                        <li><a href="#AuthItem" data-toggle="tab"><?= 'Auth Item' ?></a></li>
                    <?php endif; ?>
                    <?php if ($model->child0) : ?>
                        <li><a href="#AuthItem" data-toggle="tab"><?= 'Auth Item' ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="AuthItemChild">
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
                        <?php if ($model->parent0) : ?>
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
                            'model' => $model->parent0,
                            'attributes' => $gridColumnAuthItem
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                        <?php if ($model->child0) : ?>
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
                            'model' => $model->child0,
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
