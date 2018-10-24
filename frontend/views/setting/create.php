<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Setting */

$this->title = 'Create Setting';
//$this->params['breadcrumbs'][] = ['label' => 'Setting', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">
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
