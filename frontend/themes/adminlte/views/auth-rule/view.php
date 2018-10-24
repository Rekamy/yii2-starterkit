<?php

use kartik\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\AuthRule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Auth Rule', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-rule-view">

    <div class="box">
        <div class="box-header">
            <h2 class="box-title"><?= 'Auth Rule'.' '. Html::encode($this->title) ?></h2>
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
                    <li class="active"><a href="#AuthRule" data-toggle="tab"><?= 'Auth Rule' ?></a></li>
                    <li><a href="#AuthItem" data-toggle="tab"><?= 'Auth Item' ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="AuthRule">
                        <?php 
                        $gridColumn = [
                        'name',
                        'data',
                        ];
                        echo DetailView::widget([
                            'model' => $model,
                            'attributes' => $gridColumn
                        ]);
                    ?>
                    </div>

                    <div class="tab-pane" id="AuthItem">
<?php
                    if($providerAuthItem->totalCount){
                        $gridColumnAuthItem = [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            'type',
                            'description:ntext',
                                                        'data',
                        ];
                        echo Gridview::widget([
                            'dataProvider' => $providerAuthItem,
                            'pjax' => true,
                            'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-auth-item']],
                            'panel' => [
                                'type' => GridView::TYPE_PRIMARY,
                                'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Auth Item'),
                            ],
                            'export' => false,
                            'columns' => $gridColumnAuthItem
                        ]);
}
                        ?>

                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
