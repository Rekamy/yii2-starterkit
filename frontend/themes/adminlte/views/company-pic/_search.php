<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\CompanyPicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-company-pic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'company_id')->textInput(['placeholder' => 'Company']) ?>

    <?= $form->field($model, 'branch_id')->textInput(['placeholder' => 'Branch']) ?>

    <?= $form->field($model, 'profile_id')->textInput(['placeholder' => 'Profile']) ?>

    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>

    <?php /* echo $form->field($model, 'status')->widget(\kartik\widgets\Select2::classname(), [
            'data' => [1 => 'Active', 0 => 'Inactive'],
            'options' => ['placeholder' => 'Select status ...'],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
