<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompanyPic */

$this->title = 'Update Company Pic: ' . ' ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Company Pic', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="company-pic-update">
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
