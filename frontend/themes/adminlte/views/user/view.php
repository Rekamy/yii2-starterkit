<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
    <div class="col-sm-12">
    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'User'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="box-body">
        <div class="col-sm-4">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
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
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email:email',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <?php if ($model->profile) : ?>
    <div class="col-sm-12">
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="title">Profile<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnProfile = [
        'name',
        'ic_no',
        'contact',
        'email:email',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model->profile,
        'attributes' => $gridColumnProfile    ]);
    ?>
        </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if ($model->id0) : ?>
    <div class="col-sm-12">
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="title">Profile<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnProfile = [
        'name',
        'ic_no',
        'contact',
        'email:email',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model->id0,
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
