<?php

use yii\helpers\Html;
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
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User').' '. Html::encode($this->title) ?></h2>
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
        <div class="col-sm-12">
            <h4>Profile<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnProfile = [
        'name',
        'ic_no',
        'contact',
        'email:email',
        'status',
    ];
    if($model->profile) {
        echo DetailView::widget([
            'model' => $model->profile,
            'attributes' => $gridColumnProfile        ]);
    }
    ?>
        </div>
        <div class="col-sm-12">
            <h4>Profile<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnProfile = [
        'name',
        'ic_no',
        'contact',
        'email:email',
        'status',
    ];
    if($model->id0) {
        echo DetailView::widget([
            'model' => $model->id0,
            'attributes' => $gridColumnProfile        ]);
    }
    ?>
        </div>
    </div>
</div>
