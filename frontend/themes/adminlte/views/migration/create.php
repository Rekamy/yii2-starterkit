<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Migration */

$this->title = 'Create Migration';
//$this->params['breadcrumbs'][] = ['label' => 'Migration', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="migration-create">
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
