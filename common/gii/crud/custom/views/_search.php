<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator mootensai\enhancedgii\crud\Generator */

$fk = $generator->generateFK();

echo "<?php\n";
?>

use kartik\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

    <?= "<?php " ?>$form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<?php
$count = 0;
foreach ($generator->getColumnNames() as $attribute) {
    if (!in_array($attribute, $generator->skippedColumns)) {
        if (++$count < 6) {
            if($attribute !== 'id') {
                echo "<div class=\"col-md-4\">\n";
            }
            echo "    <?= " . $generator->generateActiveField($attribute, $fk) . " ?>\n\n";
            if($attribute !== 'id') {
                echo "</div>\n\n";
            }
        } else {
            echo "    <?php /* echo " . $generator->generateActiveField($attribute, $fk) . " */ ?>\n\n";
        }
    }
}
?>
    <div class="clearfix"></div>

    <div class="col-md-4">
        <div class="form-group">
            <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary']) ?>
            <?= "<?= " ?>Html::resetButton(<?= $generator->generateString('Reset') ?>, ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <div class="clearfix"></div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
