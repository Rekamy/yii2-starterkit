<?php
use kartik\widgets\ActiveForm;
?>

<div class="panel">
    <div class="panel-body">
        
        <div class="col-md-4">
            <?= $form->field($model[1], 'order_no')->textInput(['maxlength' => true, 'placeholder' => 'Item']) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'order_date')->widget(\kartik\datecontrol\DateControl::classname(), [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Order Date',
                        'autoclose' => true
                    ]
                ],
            ]); ?>
        </div>


        <div class="col-md-4">
            <?= $form->field($model[1], 'type_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->andWhere(['code' => '0203'])->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Gen value'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'seller_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'buyyer_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Company'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'order_by')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Profile'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'attend_by')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Profile'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'remark')->textArea(['maxlength' => true, 'placeholder' => 'Remark']) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model[1], 'status_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => 'Choose Gen value'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

