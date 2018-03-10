<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
$img = Yii::getAlias('@web/dist/img').'/6.jpg';
// dmstr\web\AdminLteAsset::register($this);
// frontend\assets\CustomAsset::register($this);

$css = "
.img-layout {
	background-image : url($img);
	background-size : 100%;
	// background-opacity : 0.4;
	// background-repeat: no-repeat;
	background-attachment: fixed;
	// background-color: rgba(155, 105, 84, 0.4);
}
.colored-layer {
	background-color: rgba(155, 105, 84, 0.4);
	// background-attachment: fixed;
	// background-position: left top;
	background-size : 100%;
	position : fixed;
	top : 0px;
	width: 100%;
	height: 100%;
	z-index: -1;
}
";
$this->registerCss($css);

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page img-layout">

<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
