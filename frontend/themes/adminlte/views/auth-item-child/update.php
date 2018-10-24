<?php

use kartik\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AuthItemChild */

$this->title = 'Update Auth Item Child: ' . ' ' . $model->parent;
//$this->params['breadcrumbs'][] = ['label' => 'Auth Item Child', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->parent, 'url' => ['view', 'parent' => $model->parent, 'child' => $model->child]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="auth-item-child-update">
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
