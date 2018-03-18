<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Profile').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
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
    </div>

        <div class="col-sm-12">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'ic_no',
        'contact',
        'email:email',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
        </div>
        <div class="col-sm-12">
            <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnUser = [
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email:email',
        'status',
    ];
    if($model->id0) {
        echo DetailView::widget([
            'model' => $model->id0,
            'attributes' => $gridColumnUser        ]);
    }
    ?>
        </div>
        <div class="col-sm-12">
            <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnUser = [
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email:email',
        'status',
    ];
    if($model->user) {
        echo DetailView::widget([
            'model' => $model->user,
            'attributes' => $gridColumnUser        ]);
    }
    ?>
        </div>
    </div>
</div>
