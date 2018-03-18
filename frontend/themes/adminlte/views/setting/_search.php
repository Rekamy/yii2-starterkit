<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\SettingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-setting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'placeholder' => 'Key']) ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true, 'placeholder' => 'Label']) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true, 'placeholder' => 'Value']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>

    <?php /* echo $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) */ ?>

    <?php /* echo $form->field($model, 'status')->textInput(['placeholder' => 'Status']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
