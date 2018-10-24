<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JtSubcategory */

$this->title = 'Update Jt Subcategory: ' . ' ' . $model->category_id;
//$this->params['breadcrumbs'][] = ['label' => 'Jt Subcategory', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->category_id, 'url' => ['view', 'category_id' => $model->category_id, 'subcategory_id' => $model->subcategory_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jt-subcategory-update">
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
