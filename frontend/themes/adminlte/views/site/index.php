<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\widgets\Growl;
?>
<div class="site-index">
    <section class="content-header">
        <h1>
            <?= Yii::t('app','Dashboard') ?>
            <small><?= Yii::t('app','Version '. Yii::$app->params['version']) ?></small>
        </h1>
        <!--        <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>-->
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua-gradient">
                            <div class="inner">
                                <h3><?= $data[0]['value'] ?></h3>

                                <p><?= $data[0]['description'] ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',$data[0]['url'],['class' => 'small-box-footer']) ?>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green-gradient">
                            <div class="inner">
                                <h3><?= $data[1]['value'] ?></h3>
                                <p><?= $data[0]['description'] ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',$data[0]['url'],['class' => 'small-box-footer']) ?>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow-gradient">
                            <div class="inner">
                                <h3><?= $data[2]['value'] ?></h3>

                                <p><?= $data[0]['description'] ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',$data[0]['url'],['class' => 'small-box-footer']) ?>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red-gradient">
                            <div class="inner">
                                <h3><?= $data[3]['value'] ?></h3>
                                <p><?= $data[0]['description'] ?></p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',$data[0]['url'],['class' => 'small-box-footer']) ?>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <!-- /.row -->
                <div class="row">
                    new content here
                </div>


            </section>

    </div>
