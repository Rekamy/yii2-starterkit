<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Movement */

$this->title = 'Create Movement';
//$this->params['breadcrumbs'][] = ['label' => 'Movement', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movement-create">
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
