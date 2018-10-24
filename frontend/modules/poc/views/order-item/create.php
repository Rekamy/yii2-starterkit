<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrderItem */

$this->title = 'Create Order Item';
//$this->params['breadcrumbs'][] = ['label' => 'Order Item', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-item-create">
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
