<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
// use kartik\widgets\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">
            <a href="#"><b><?= Yii::$app->params['appNameShort'] ?></b></a>
        </div>
        <!-- /.login-logo -->
        <p class="login-box-msg">Please fill out the following fields to signup:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->field($model, 'email',[
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
        ])
        ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form
        ->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
        ])
        ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
        ->field($model, 'name', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
        ])
        ->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

        <?= $form
        ->field($model, 'contact', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>"
        ])
        ->textInput(['placeholder' => $model->getAttributeLabel('contact')]) ?>

        <?= $form
        ->field($model, 'ic_no', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-list form-control-feedback'></span>"
        ])
        ->textInput(['placeholder' => $model->getAttributeLabel('ic_no')]) ?>

        <?= $form
        ->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
        ])
        ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

        <?= Html::a('I forgot my password',['/site/request-password-reset']) ?><br>
        <?= Html::a('Already register',['/site/login']) ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

