<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Migration */

$this->title = 'Update Migration: ' . ' ' . $model->version;
//$this->params['breadcrumbs'][] = ['label' => 'Migration', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->version, 'url' => ['view', 'id' => $model->version]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="migration-update">
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
