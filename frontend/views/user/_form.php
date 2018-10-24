<?php

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
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
        'class' => 'Branch', 
        'relID' => 'branch', 
        'value' => \yii\helpers\Json::encode($model->branches),
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
        'class' => 'CompanyPic', 
        'relID' => 'company-pic', 
        'value' => \yii\helpers\Json::encode($model->companyPics),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'GenMod', 
        'relID' => 'gen-mod', 
        'value' => \yii\helpers\Json::encode($model->genMods),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'GenModref', 
        'relID' => 'gen-modref', 
        'value' => \yii\helpers\Json::encode($model->genModrefs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'GenModrefProgress', 
        'relID' => 'gen-modref-progress', 
        'value' => \yii\helpers\Json::encode($model->genModrefProgresses),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'GenModtype', 
        'relID' => 'gen-modtype', 
        'value' => \yii\helpers\Json::encode($model->genModtypes),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'GenValue', 
        'relID' => 'gen-value', 
        'value' => \yii\helpers\Json::encode($model->genValues),
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
        'class' => 'Profile', 
        'relID' => 'profile', 
        'value' => \yii\helpers\Json::encode($model->profiles),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Purchase', 
        'relID' => 'purchase', 
        'value' => \yii\helpers\Json::encode($model->purchases),
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

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

<div class="col-md-4">
    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Username']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true, 'placeholder' => 'Auth Key']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true, 'placeholder' => 'Password Hash']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true, 'placeholder' => 'Password Reset Token']) ?>
</div>

<div class="col-md-4">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>
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
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Branch'),
            'content' => $this->render('_formBranch', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->branches),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Company'),
            'content' => $this->render('_formCompany', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->companies),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('CompanyPic'),
            'content' => $this->render('_formCompanyPic', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->companyPics),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('GenMod'),
            'content' => $this->render('_formGenMod', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->genMods),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('GenModref'),
            'content' => $this->render('_formGenModref', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->genModrefs),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('GenModrefProgress'),
            'content' => $this->render('_formGenModrefProgress', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->genModrefProgresses),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('GenModtype'),
            'content' => $this->render('_formGenModtype', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->genModtypes),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('GenValue'),
            'content' => $this->render('_formGenValue', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->genValues),
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
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Profile'),
            'content' => $this->render('_formProfile', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->profiles),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Purchase'),
            'content' => $this->render('_formPurchase', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->purchases),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Setting'),
            'content' => $this->render('_formSetting', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->settings),
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
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
