<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
$languages = \common\models\Languages::find()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, minimum-scale=1, maximum-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="theme-color" content="#fff">
    <!-- Open Graph -->
    <!--	 <meta name="og:title" content="ArcticAir">
        <meta name="og:description" content="">
        <meta name="og:url" content="">
        <meta name="og:site_name" content="ArcticAir">
        <meta name="og:locale" content="ru_RU">
        <meta name="fb:app_id" content="">
        <meta name="og:type" content="website">
        <meta name="og:image" content=""> -->
    <!-- Open Graph -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131662756-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-131662756-3');
    </script>
    <?php if (isset($this->blocks['pixel'])): ?>
    <?= $this->blocks['pixel'] ?>
    <?php endif; ?>
    <?php $this->head() ?>
    <style type="text/css">
        #preloader {
            width: 100%;
            height: 100%;
            position: fixed;
            background-color: white;
            background-image: url(/img/logo.png);
            background-position: center;
            background-repeat: no-repeat;
            background-size: 15vmax;
            opacity: 0;
            transition: opacity 0.3s ease 0s, z-index 0s linear 0.3s;
            z-index: -100;
        }
        #preloader.active {
            z-index: 99999;
            opacity: 1;
        }
    </style>
    <script src="//code.jivosite.com/widget.js" data-jv-id="7Ntdy5x552" async></script>
</head>
<body class="euro">
<?php $this->beginBody() ?>
<!-- Preloader --> 
<div id="preloader" class="active"></div> 

<div id="pagenav-outer">
    <div id="pagenav">
        <!--<a class="pagelink" href="#">Top</a>
            <a class="pagelink" href="#">Advantages</a>
            <a class="pagelink" href="#">All products</a> -->
    </div>
</div>
<script>
    window.onload = function() {
        document.getElementById('preloader').classList.remove('active');
    }
</script>

<header id="header">
    <nav>
        <a id="logo-a" href="/">
            <img id="logo" alt="ArcticAir Logo" src="/img/logo.png">
        </a>
        <button class="btn blue phone" id="callback-btn"><?= Yii::t('app', 'Call back') ?></button>
        <a class="btn white phone tel" href="tel:+380503040500">+38 050 30 40 500</a>
        <div class="btn white lang" id="toplang">
            <?php foreach ($languages as $lang): ?>
                <?php if (Yii::$app->language == 'it' || Yii::$app->language == 'es' || Yii::$app->language == 'pt'): ?>
                    <?php if ($lang->lang == 'ro'): ?>
                        <?php continue; ?>
                    <?php else: ?>
                        <a href="<?= $lang->lang ?>" class="<?= Yii::$app->language === $lang->lang ? 'active' : ''?>" ><?= $lang->lang ?></a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?= $lang->lang ?>" class="<?= Yii::$app->language === $lang->lang ? 'active' : ''?>" ><?= $lang->lang ?></a>
                <? endif; ?>
            <?php endforeach; ?>
        </div>
    </nav>


    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
