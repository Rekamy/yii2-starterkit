<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Asset */

$this->title = 'Create Asset';
//$this->params['breadcrumbs'][] = ['label' => 'Asset', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-create">
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
