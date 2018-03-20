<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true, 'placeholder' => 'Avatar']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'ic_no')->textInput(['maxlength' => true, 'placeholder' => 'Ic No']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'contact')->textInput(['maxlength' => true, 'placeholder' => 'Contact']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
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
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
