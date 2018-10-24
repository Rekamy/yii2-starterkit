<?php
use kartik\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('AuthItem'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Auth Assignment'),
        'content' => $this->render('_dataAuthAssignment', [
            'model' => $model,
            'row' => $model->authAssignments,
        ]),
    ],
                [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Auth Item Child'),
        'content' => $this->render('_dataAuthItemChild', [
            'model' => $model,
            'row' => $model->authItemChildren,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
