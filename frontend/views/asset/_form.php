<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Asset */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="asset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<div class="col-md-4">
    <?= $form->field($model, 'category')->textInput(['maxlength' => true, 'placeholder' => 'Category']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'subcategory')->textInput(['maxlength' => true, 'placeholder' => 'Subcategory']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'asset_no')->textInput(['maxlength' => true, 'placeholder' => 'Asset No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'supplier_id')->textInput(['placeholder' => 'Supplier']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'supplier_code_no')->textInput(['maxlength' => true, 'placeholder' => 'Supplier Code No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'manufacturer_id')->textInput(['placeholder' => 'Manufacturer']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'manufacturer_code_no')->textInput(['maxlength' => true, 'placeholder' => 'Manufacturer Code No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'client_id')->textInput(['placeholder' => 'Client']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'client_code_no')->textInput(['maxlength' => true, 'placeholder' => 'Client Code No']) ?>
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
