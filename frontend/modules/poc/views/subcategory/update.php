<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subcategory */

$this->title = 'Update Subcategory: ' . ' ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Subcategory', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategory-update">
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
