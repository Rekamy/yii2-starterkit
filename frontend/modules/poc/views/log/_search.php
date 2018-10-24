<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\LogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<div class="col-md-4">
    <?= $form->field($model, 'level')->textInput(['placeholder' => 'Level']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'placeholder' => 'Category']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'log_time')->textInput(['placeholder' => 'Log Time']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'prefix')->textarea(['rows' => 6]) ?>

</div>

    <?php /* echo $form->field($model, 'message')->textarea(['rows' => 6]) */ ?>

    <div class="clearfix"></div>

    <div class="col-md-4">
        <div class="form-group">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <div class="clearfix"></div>

    <?php ActiveForm::end(); ?>

</div>
