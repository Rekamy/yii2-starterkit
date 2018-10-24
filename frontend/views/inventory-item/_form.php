<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\InventoryItem */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="inventory-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<div class="col-md-4">
    <?= $form->field($model, 'order_id')->textInput(['placeholder' => 'Order']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'code_no')->textInput(['placeholder' => 'Code No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'card_no')->textInput(['maxlength' => true, 'placeholder' => 'Card No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'serial_no')->textInput(['maxlength' => true, 'placeholder' => 'Serial No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
            'data' => [1 => 'Active', 0 => 'Inactive'],
            'options' => ['placeholder' => 'Select status ...'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>
</div>

    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="col-md-4">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
