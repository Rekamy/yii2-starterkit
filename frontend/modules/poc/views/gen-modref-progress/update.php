<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GenModrefProgress */

$this->title = 'Update Gen Modref Progress: ' . ' ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Gen Modref Progress', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-modref-progress-update">
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
