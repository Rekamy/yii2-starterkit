<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Log */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

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

<div class="col-md-4">
    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
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
