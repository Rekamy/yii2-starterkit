<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GenValue */

$this->title = 'Create Gen Value';
//$this->params['breadcrumbs'][] = ['label' => 'Gen Value', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-value-create">
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
