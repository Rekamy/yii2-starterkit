<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
    <div class="col-sm-12">
    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= Yii::t('app', 'User').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="box-body">
        <div class="col-sm-4">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>

        <div class="col-sm-12">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
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
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <?php if ($model->profile) : ?>
    <div class="col-sm-12">
    <div class="box box-danger">
        <div class="box-header">
            <h4 class="title">Profile<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnProfile = [
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
        'model' => $model->profile,
        'attributes' => $gridColumnProfile    ]);
    ?>
        </div>
        </div>
    </div>
    <?php endif; ?>
    </div>
    </div>
    </div>
    </div>
</div>
