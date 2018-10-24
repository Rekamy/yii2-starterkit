<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\GenModrefProgressSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-gen-modref-progress-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<div class="col-md-4">
    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'next')->textInput(['maxlength' => true, 'placeholder' => 'Next']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'return')->textInput(['maxlength' => true, 'placeholder' => 'Return']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

</div>

    <?php /* echo $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) */ ?>

    <?php /* echo $form->field($model, 'status_id')->textInput(['placeholder' => 'Status']) */ ?>

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
