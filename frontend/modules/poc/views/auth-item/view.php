<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Auth Item'.' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a('Update', ['update', 'id' => $model->name], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->name], [
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
                    <li class="active"><a href="#AuthItem" data-toggle="tab"><?= 'Auth Item' ?></a></li>
                    <li><a href="#AuthAssignment" data-toggle="tab"><?= 'Auth Assignment' ?></a></li>
                    <?php if ($model->ruleName) : ?>
                        <li><a href="#AuthRule" data-toggle="tab"><?= 'Auth Rule' ?></a></li>
                    <?php endif; ?>
                    <li><a href="#AuthItemChild" data-toggle="tab"><?= 'Auth Item Child' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="AuthItem">
                        <?php 
                        $gridColumn = [
                        'name',
                        'type',
                        'description:ntext',
                        [
            'attribute' => 'ruleName.name',
            'label' => 'Rule Name',
        ],
                        'data',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                    ?>
                    </div>

                    <div class="tab-pane" id="AuthAssignment">
<?php
                    if($providerAuthAssignment->totalCount){
                        $gridColumnAuthAssignment = [
                            ['class' => 'yii\grid\SerialColumn'],
                                                        'user_id',
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerAuthAssignment,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-auth-assignment']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Auth Assignment'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnAuthAssignment
                        ]);
}
                        ?>

                        </div>
                        <?php if ($model->ruleName) : ?>
                        <div class="tab-pane" id="AuthRule">
                        <?php 
                        $gridColumnAuthRule = [
                        'name',
                        'data',
                        ];
                        echo DetailView::widget([
                            'model' => $model->ruleName,
                            'attributes' => $gridColumnAuthRule
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>

                    <div class="tab-pane" id="AuthItemChild">
<?php
                    if($providerAuthItemChild->totalCount){
                        $gridColumnAuthItemChild = [
                            ['class' => 'yii\grid\SerialColumn'],
                                                                                ];
                        echo Gridview::widget([
                            'dataProvider' => $providerAuthItemChild,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-auth-item-child']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Auth Item Child'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnAuthItemChild
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
