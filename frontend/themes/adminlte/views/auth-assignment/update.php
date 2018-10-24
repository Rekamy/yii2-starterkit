<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */

$this->title = 'Update Auth Assignment: ' . ' ' . $model->item_name;
//$this->params['breadcrumbs'][] = ['label' => 'Auth Assignment', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->item_name, 'url' => ['view', 'item_name' => $model->item_name, 'user_id' => $model->user_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auth-assignment-update">
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
