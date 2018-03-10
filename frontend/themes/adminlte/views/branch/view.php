<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Branch', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-view">

    <div class="row">
    <div class="col-sm-12">
    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Branch'.' '. Html::encode($this->title) ?></h2>
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
        [
                'attribute' => 'company.name',
                'label' => 'Company',
            ],
        'name',
        'address',
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
    <?php if ($model->company) : ?>
    <div class="col-sm-12">
    <div class="box box-primary">
        <div class="box-header">
            <h4 class="title">Company<?= ' '. Html::encode($this->title) ?></h4>
    <?php 
    $gridColumnCompany = [
        ['attribute' => 'id', 'visible' => false],
        'name',
        'address',
        'contact',
        'email:email',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model->company,
        'attributes' => $gridColumnCompany    ]);
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
