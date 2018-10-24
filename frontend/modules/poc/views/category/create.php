<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = 'Create Category';
//$this->params['breadcrumbs'][] = ['label' => 'Category', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">
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
