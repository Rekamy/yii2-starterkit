<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Company */

$this->title = 'Update Company: ' . ' ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Company', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-update">
	<div class="panel panel-primary">
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
