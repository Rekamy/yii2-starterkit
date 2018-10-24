<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Transaction */

$this->title = 'Create Transaction';
//$this->params['breadcrumbs'][] = ['label' => 'Transaction', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-create">
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
