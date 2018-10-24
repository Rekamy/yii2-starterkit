<?php

use kartik\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */


\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'OrderItem', 
        'relID' => 'order-item', 
        'type' => $type, 
        'value' => \yii\helpers\Json::encode($model->orderItems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

    <?= $form->errorSummary($model); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'type_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()
                ->andWhere(['code' => '0203'])->andWhere(['like', 'name', strtoupper($type)])
                ->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => [
                'id' => 'order-item-type-id',
                'placeholder' => 'Choose Order Type',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'order_no')->textInput(['maxlength' => true, 'placeholder' => 'Order No']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'order_date')->widget(\kartik\datecontrol\DateControl::classname(), [
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
        <?= $form->field($model, 'attend_date')->widget(\kartik\datecontrol\DateControl::classname(), [
            'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'saveFormat' => 'php:Y-m-d',
            'ajaxConversion' => true,
            'options' => [
                'pluginOptions' => [
                    'placeholder' => 'Choose Attend Date',
                    'autoclose' => true
                ]
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'seller_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Choose Company'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'buyyer_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\Company::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Choose Company'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'order_by')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Choose Profile'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'attend_by')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Choose Profile'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="clearfix"></div>

    <div class="col-md-4">
        <?= $form->field($model, 'remark')->textArea(['maxlength' => true, 'placeholder' => 'Remark']) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\GenValue::find()->andWhere(['code' => '0201'])->orderBy('id')->asArray()->all(), 'id', 'name'),
            'options' => ['placeholder' => 'Choose Gen value'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
    </div>

    <div class="clearfix"></div>
    <div class="col-md-12">
        <?php

        $forms = [
            [
                'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(ucfirst($type)),
                'content' => $this->render('_formOrder'.ucfirst($type), [
                    'row' => \yii\helpers\ArrayHelper::toArray($model->orderItems),
                ]),
            ],
/*            [
                'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Order Asset'),
                'content' => $this->render('_formOrderAsset', [
                    'row' => \yii\helpers\ArrayHelper::toArray($model->orderItems),
                ]),
            ],
            [
                'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Order Inventory'),
                'content' => $this->render('_formOrderInventory', [
                    'row' => \yii\helpers\ArrayHelper::toArray($model->orderItems),
                ]),
            ],*/
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