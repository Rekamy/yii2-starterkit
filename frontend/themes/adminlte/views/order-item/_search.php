<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\OrderItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-order-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

<div class="col-md-4">
    <?= $form->field($model, 'type_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Gen value'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'order_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Order::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Order'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'item_id')->textInput(['placeholder' => 'Item']) ?>

</div>

<div class="col-md-4">
    <?= $form->field($model, 'rq_quantity')->textInput(['placeholder' => 'Rq Quantity']) ?>

</div>

    <?php /* echo $form->field($model, 'app_quantity')->textInput(['placeholder' => 'App Quantity']) */ ?>

    <?php /* echo $form->field($model, 'approved_at')->textInput(['placeholder' => 'Approved At']) */ ?>

    <?php /* echo $form->field($model, 'approved_by')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Profile'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) */ ?>

    <?php /* echo $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Gen value'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

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
