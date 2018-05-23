<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use Yii;

class Notify {

    public $config;
    public $key;
    public $message;
    public $duration;
    public $title;

    public function fail($config = null) {

        $this->message = isset($config['message']) ? $config['message'] : Yii::t('app','Error processing request');
        $this->duration = isset($config['duration']) ? $config['duration'] : 8000;
        $this->title = isset($config['title']) ? $config['title'] : Yii::t('app',' Fail');
        $this->key = isset($config['key']) ? $config['key'] : 0;
        // $this->duration = 10000;
        // $this->duration = 1000000;
        return Yii::$app->session->setFlash($this->key, [
            'type' => 'danger',
            'duration' => $this->duration,
            'icon' => 'glyphicon glyphicon-remove-sign',
            'title' => $this->title,
            'message' => $this->message,
        ]);
    }

    public function success($config = null) {
        $this->message = isset($config['message']) ? $config['message'] : Yii::t('app','Error processing request');
        $this->duration = isset($config['duration']) ? $config['duration'] : 8000;
        $this->title = isset($config['title']) ? $config['title'] : Yii::t('app',' Fail');
        $this->key = isset($config['key']) ? $config['key'] : 0;

        return Yii::$app->session->setFlash($this->key, [
            'type' => 'success',
            'duration' => $this->duration,
            'icon' => 'glyphicon glyphicon-check-sign',
            'title' => $this->title,
            'message' => $this->message,
        ]);
    }

    public function info($config = null) {
        $this->message = isset($config['message']) ? $config['message'] : Yii::t('app','Info Message');
        $this->duration = isset($config['duration']) ? $config['duration'] : 8000;
        $this->title = isset($config['title']) ? $config['title'] : Yii::t('app',' Info');
        $this->key = isset($config['key']) ? $config['key'] : 0;

        return Yii::$app->session->setFlash($this->key, [
            'type' => 'info',
            'duration' => $this->duration,
            'icon' => 'glyphicon glyphicon-info-sign',
            'title' => $this->title,
            'message' => $this->message,
        ]);
    }

    public function warning($config = null) {
        $this->message = isset($config['message']) ? $config['message'] : Yii::t('app','Something is wrong');
        $this->duration = isset($config['duration']) ? $config['duration'] : 8000;
        $this->title = isset($config['title']) ? $config['title'] : Yii::t('app',' Warning');
        $this->key = isset($config['key']) ? $config['key'] : 0;

        return Yii::$app->session->setFlash($this->key, [
            'type' => 'warning',
            'duration' => $this->duration,
            'icon' => 'glyphicon glyphicon-exclamation-mark',
            'title' => $this->title,
            'message' => $this->message,
        ]);
    }

}
