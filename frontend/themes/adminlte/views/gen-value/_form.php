<?php

use kartik\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GenValue */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Asset', 
        'relID' => 'asset', 
        'value' => \yii\helpers\Json::encode($model->assets),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Category', 
        'relID' => 'category', 
        'value' => \yii\helpers\Json::encode($model->categories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Company', 
        'relID' => 'company', 
        'value' => \yii\helpers\Json::encode($model->companies),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Diposal', 
        'relID' => 'diposal', 
        'value' => \yii\helpers\Json::encode($model->diposals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'DiposalItem', 
        'relID' => 'diposal-item', 
        'value' => \yii\helpers\Json::encode($model->diposalItems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Inventory', 
        'relID' => 'inventory', 
        'value' => \yii\helpers\Json::encode($model->inventories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'InventoryItem', 
        'relID' => 'inventory-item', 
        'value' => \yii\helpers\Json::encode($model->inventoryItems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'JtSubcategory', 
        'relID' => 'jt-subcategory', 
        'value' => \yii\helpers\Json::encode($model->jtSubcategories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Location', 
        'relID' => 'location', 
        'value' => \yii\helpers\Json::encode($model->locations),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Maintenance', 
        'relID' => 'maintenance', 
        'value' => \yii\helpers\Json::encode($model->maintenances),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Movement', 
        'relID' => 'movement', 
        'value' => \yii\helpers\Json::encode($model->movements),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Order', 
        'relID' => 'order', 
        'value' => \yii\helpers\Json::encode($model->orders),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'OrderItem', 
        'relID' => 'order-item', 
        'value' => \yii\helpers\Json::encode($model->orderItems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'PersonInCharge', 
        'relID' => 'person-in-charge', 
        'value' => \yii\helpers\Json::encode($model->personInCharges),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Profile', 
        'relID' => 'profile', 
        'value' => \yii\helpers\Json::encode($model->profiles),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Setting', 
        'relID' => 'setting', 
        'value' => \yii\helpers\Json::encode($model->settings),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Subcategory', 
        'relID' => 'subcategory', 
        'value' => \yii\helpers\Json::encode($model->subcategories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Transaction', 
        'relID' => 'transaction', 
        'value' => \yii\helpers\Json::encode($model->transactions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'User', 
        'relID' => 'user', 
        'value' => \yii\helpers\Json::encode($model->users),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Warranty', 
        'relID' => 'warranty', 
        'value' => \yii\helpers\Json::encode($model->warranties),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="gen-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<div class="col-md-4">
    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'placeholder' => 'Description']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'remark')->textInput(['maxlength' => true, 'placeholder' => 'Remark']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'status_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Profile::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => 'Choose Profile'],
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
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Asset'),
            'content' => $this->render('_formAsset', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->assets),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Category'),
            'content' => $this->render('_formCategory', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->categories),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Company'),
            'content' => $this->render('_formCompany', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->companies),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Diposal'),
            'content' => $this->render('_formDiposal', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->diposals),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('DiposalItem'),
            'content' => $this->render('_formDiposalItem', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->diposalItems),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Inventory'),
            'content' => $this->render('_formInventory', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->inventories),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('InventoryItem'),
            'content' => $this->render('_formInventoryItem', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->inventoryItems),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('JtSubcategory'),
            'content' => $this->render('_formJtSubcategory', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->jtSubcategories),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Location'),
            'content' => $this->render('_formLocation', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->locations),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Maintenance'),
            'content' => $this->render('_formMaintenance', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->maintenances),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Movement'),
            'content' => $this->render('_formMovement', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->movements),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Order'),
            'content' => $this->render('_formOrder', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->orders),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('OrderItem'),
            'content' => $this->render('_formOrderItem', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->orderItems),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('PersonInCharge'),
            'content' => $this->render('_formPersonInCharge', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->personInCharges),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Profile'),
            'content' => $this->render('_formProfile', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->profiles),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Setting'),
            'content' => $this->render('_formSetting', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->settings),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Subcategory'),
            'content' => $this->render('_formSubcategory', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->subcategories),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Transaction'),
            'content' => $this->render('_formTransaction', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->transactions),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('User'),
            'content' => $this->render('_formUser', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->users),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Warranty'),
            'content' => $this->render('_formWarranty', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->warranties),
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
