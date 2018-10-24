<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GenValue */

$this->title = 'Update Gen Value: ' . ' ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Gen Value', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-value-update">
	<div class="panel panel-danger">
		<div class="panel-heading">
		    <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
		</div>
		<div class="panel-body">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
