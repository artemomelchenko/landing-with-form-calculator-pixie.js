<?php
/* @var $this yii\web\View */

$this->title = 'Arctic Air';
$this->registerJsFile('/js/script.js', ['depends' => [yii\web\JqueryAsset::className()]]);

$currency = Yii::$app->language === 'ro' ? 'lei' : 'euro';
?>
 
<section class="snownsteam mfullh">
    <a href="/" class="to-home">
        <div class="slider-nav slider-prev close-form" id="back-to-home"></div>
        <span>Back</span>
    </a>
    <div class="modal form static active">
        <a class="slider-nav slider-prev close-form" id="back-to-home-in-form" href="/"></a>
        <h2 class="form-h2"><?= Yii::t('app', 'Your Contacts') ?></h2>
        <form action="" id="buy-form" method="post">
            <div class="input">
                <label><?= Yii::t('app', 'First Name') ?></label>
                <input type="text" name="name" placeholder="<?= Yii::t('app', 'Enter your first name') ?>">
            </div>
            <div class="input">
                <label><?= Yii::t('app', 'Your City') ?></label>
                <input type="text" name="city" placeholder="<?= Yii::t('app', 'Enter your city') ?>">
            </div>
            <div class="input marbot30">
                <label><?= Yii::t('app', 'Phone Number') ?></label>
                <input type="text" name="tel" placeholder="<?= Yii::t('app', 'Enter your phone number') ?>">
            </div>
            <hr>
            <div class="input-t-row">
                <span class="h3"><?= Yii::t('app', 'Together') ?></span>
                <span class="input-style buy-amount"><?= $data['count'] ?></span>
                <span class="input-style buy-price price"><?= $data['price'] ?><span class="currency"><?= $currency ?></span></span>
                
            </div>
        </form>
        <button class="btn blue" name="value" value="buyform" form="buy-form" id="buy-btn">buy</button>
    </div>
</section>

<script>
        document.getElementById('header').style.overflowY = 'auto';
        document.getElementById('header').classList.add('buyformHeader');
</script>
