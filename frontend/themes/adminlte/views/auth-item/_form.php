<?php

use kartik\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItem */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AuthAssignment', 
        'relID' => 'auth-assignment', 
        'value' => \yii\helpers\Json::encode($model->authAssignments),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AuthItemChild', 
        'relID' => 'auth-item-child', 
        'value' => \yii\helpers\Json::encode($model->authItemChildren),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'type')->textInput(['placeholder' => 'Type']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'rule_name')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\AuthRule::find()->orderBy('name')->asArray()->all(), 'name', 'name'),
        'options' => ['placeholder' => 'Choose Auth rule'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'data')->textInput(['placeholder' => 'Data']) ?>
</div>

    <div class="clearfix"></div>

<div class="col-md-12">
    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AuthAssignment'),
            'content' => $this->render('_formAuthAssignment', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->authAssignments),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AuthItemChild'),
            'content' => $this->render('_formAuthItemChild', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->authItemChildren),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
</div>
    <div class="clearfix"></div>

    <div class="col-md-4">
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
