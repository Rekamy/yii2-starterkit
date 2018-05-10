<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= Yii::t('app', 'Profile').' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#Profile" data-toggle="tab"><?= Yii::t('app', 'Profile') ?></a></li>
                    <?php if ($model->id0) : ?>
                        <li><a href="#User" data-toggle="tab"><?= Yii::t('app', 'User') ?></a></li>
                    <?php endif; ?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Profile">
                        <?php 
                        $gridColumn = [
                        ['attribute' => 'id', 'visible' => false],
                        'name',
                        'avatar',
                        'ic_no',
                        'contact',
                        'email:email',
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
                        <?php if ($model->id0) : ?>
                        <div class="tab-pane" id="User">
                        <?php 
                        $gridColumnUser = [
                        'username',
                        'email:email',
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
                            'model' => $model->id0,
                            'attributes' => $gridColumnUser
                        ]);
                        ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
