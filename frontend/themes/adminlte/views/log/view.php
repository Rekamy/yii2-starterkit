<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Log */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Log'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= Yii::t('app', 'Log').' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-sm btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="box-body">

            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#Log" data-toggle="tab"><?= Yii::t('app', 'Log') ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Log">
                        <?php 
                        $gridColumn = [
                        ['attribute' => 'id', 'visible' => false],
                        'level',
                        'category',
                        'log_time',
                        'prefix:ntext',
                        'message:ntext',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
