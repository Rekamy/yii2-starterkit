<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Migration */

$this->title = $model->version;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Migration'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="migration-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= Yii::t('app', 'Migration').' '. Html::encode($this->title) ?></h2>
            <div class="pull-right">
                <?= Html::a(Yii::t('app', 'Back'), Yii::$app->request->referrer, ['class' => 'btn btn-sm btn-default']) ?>                        
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->version], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->version], [
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
                    <li class="active"><a href="#Migration" data-toggle="tab"><?= Yii::t('app', 'Migration') ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Migration">
                        <?php 
                        $gridColumn = [
                        'version',
                        'apply_time:datetime',
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
