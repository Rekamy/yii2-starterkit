<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Migration */

$this->title = Yii::t('app', 'Create Migration');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Migration'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="migration-create">
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
