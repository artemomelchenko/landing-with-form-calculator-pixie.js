<?php

/* @var $this yii\web\View */
/* @var $languages common\models\Languages */

$this->title = 'Arctic Air';
$this->registerJsFile('/js/script.js', ['depends' => [yii\web\JqueryAsset::className()]]);

$currency = Yii::$app->language === 'ro' ? 'lei' : 'euro';
?>

<?php $this->beginBlock('pixel'); ?>
<!-- Facebook Pixel Code -->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '354674271894205');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=354674271894205&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
<?php $this->endBlock(); ?>
<div id="header-anim-outer-wrap">
    <div id="header-anim-outer">
        <div id="header-anim"></div>
    </div>
</div>
<div class="header-img" id="header-palm1"></div>
<div class="header-img" id="header-palm2"></div>
<div class="header-img" id="header-img-penguin"></div>
<div class="header-img" id="header-img-snow-b"></div>
<div class="header-img" id="header-balloon"></div>
<div id="header-smoke"></div>
<div class="header-img" id="header-img-snow-f"></div>
<div id="header-content">
    <h1>ArcticAir<br><span><?= Yii::t('app', 'The Best Freon') ?></span></h1>
    <p>
        <?php foreach ($language->settings as $setting): ?>
        <?php if ($setting->name === 'First section'): ?>
            <?= $setting->text ?>
        <?php endif; ?>
        <?php endforeach; ?>
    </p>
    <a class="btn blue" href="#anchor-makeorder"><?= Yii::t('app', 'Make Order') ?></a>
</div>
</header>
<section class="snownsteam" id="advantages">
    <h2><?= Yii::t('app', 'Advantages') ?></h2>
    <div id="advantages-bg"><?= Yii::t('app', 'Advantages') ?></div>
    <div class="rectangle-items" id="advantages-slider">
        <div class="rectangle-item-outer">
            <div class="rectangle-item">
                <div class="advantages-img delivery"></div>
                <h3><?= Yii::t('app', 'Quick delivery') ?></h3>
                <span class="delivery-hours"><?= Yii::t('app', '48H') ?></span>
                <p><?= Yii::t('app', 'Delivery within 48 hours across the country') ?></p>
            </div>
        </div>
        <div class="rectangle-item-outer">
            <div class="rectangle-item">
                <div class="advantages-img payment"></div>
                <h3><?= Yii::t('app', 'Payment on receipt') ?></h3>
                <p><?= Yii::t('app', 'We work without prepayments') ?></p>
            </div>
        </div>
        <div class="rectangle-item-outer">
            <div class="rectangle-item">
                <div class="advantages-img quality"></div>
                <h3><?= Yii::t('app', 'Quality control') ?></h3>
                <p><?= Yii::t('app', 'All our products pass quality control') ?></p>
            </div>
        </div>
        <div class="rectangle-item-outer">
            <div class="rectangle-item">
                <div class="advantages-img certificate"></div>
                <h3><?= Yii::t('app', 'Certificates') ?></h3>
                <p><?= Yii::t('app', 'All our products are certified') ?></p>
            </div>
        </div>
        <div class="rectangle-item-outer">
            <div class="rectangle-item">
                <div class="advantages-img weight"></div>
                <h3><?= Yii::t('app', 'Conformity of weight') ?></h3>
                <p><?= Yii::t('app', 'We honestly indicate the weight of the balloon') ?></p>
            </div>
        </div>
    </div>
    <!-- 		<div class="row">
                <button class="btn blue" id="open-certificates">Certificates</button>
            </div> -->
</section>
<section id="allproducts">
    <h2><?= Yii::t('app', 'All products') ?></h2>
    <div id="allproducts-row">
        <div id="allproducts-list">
            <?php $a = 0; ?>
            <?php foreach ($language->products as $setting): ?>
            <?php $a++ ?>
            <button class="allproducts-btn <?= $a == 1 ? 'active' : '' ?>">
                <img class="allproducts-img" alt="model" title="model" src="/img/uploads/<?= $setting->img ?>">
            </button>
            <?php endforeach; ?>
        </div>
        <div id="allproducts-preview-outer">

            <div class="allproducts-preview-bg" id="allproducts-preview-palm2"></div>
            <div class="allproducts-preview-bg" id="allproducts-preview-snow-b"></div>
            <div id="allproducts-preview-img"></div>
            <div class="allproducts-preview-bg" id="allproducts-preview-snow-f"></div>
            <svg id="allproducts-svg" viewBox="0 0 554 554" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="circleGradient"
                                    x1="100%" y1="50%"
                                    x2="0%" y2="50%"
                                    spreadMethod="pad">
                        <stop offset="10%" stop-color="#ADE1FF" stop-opacity="1"/>
                        <stop offset="100%" stop-color="#4293C1" stop-opacity="1"/>
                    </linearGradient>
                </defs>
                <circle id="allproducts-circle" r="273" cx="277" cy="277" stroke="url(#circleGradient)" stroke-width="8" fill="none" stroke-dasharray="1720" stroke-dashoffset="1720"></circle>
            </svg>
        </div>
        <div id="allproducts-description-outer">
            <?php $i = 0; ?>
            <?php foreach ($language->products as $product): ?>
            <?php $i++ ?>
            <div class="allproducts-description <?= $i == 1 ? 'active' : '' ?>">
                <h4><?= $product->name ?> <span><?= $product->model ?></span></h4>
                <p class="allproducts-p">
                    <?= $product->text ?>
                </p>
                <span class="h5"><?= Yii::t('app', 'Application') ?></span>
                <div class="applications">
                    <?php $app_ids = explode(',', $product->application_id) ?>
                    <?php $apps = \common\models\Applications::find()->where(['id' => $app_ids])->all() ?>
                    <?php foreach ($apps as $app): ?>
                    <div class="alttitle">
                        <img class="applications-img" src="/img/applications/<?= $app->img ?>" alt="conditioner">
                        <span><?= Yii::t('app', $app->name) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
                <a href="#anchor-makeorder" class="btn blue"><?= Yii::t('app', 'Make Order') ?></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section id="assortiment">
    <h2><?= Yii::t('app', 'Assortiment') ?></h2>
    <div id="assortiment-row">
        <?php foreach ($language->products as $product): ?>
        <div class="rectangle-item-outer">
            <div class="rectangle-item">
                <img class="assortiment-img" src="/img/uploads/<?= $product->img ?>">
                <span class="h3"><?= $product->name ?> <?= $product->model ?></span>
                <span class="assortiment-weight"><?= Yii::t('app', 'Weight') ?>: <span><?= $product->weight ?></span></span>
                <span class="assortiment-price price"><?= Yii::t('app', 'Price') ?>: 
                    <span><?= $product->price ?></span>
                    <span class="currency"><?= $currency ?></span>
                </span>
                <a class="btn blue addnewballon" data-model="134A" href="#anchor-makeorder"> <?= Yii::t('app', 'Buy') ?></a>
                <?= \yii\helpers\Html::a(Yii::t('app', 'Certificates'), [
                    'pdf',
                    'model' => $product->model,
                ], [
                    'class' => 'link',
                    'target' => '_blank',
                ]); ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<?php if (!empty($language->reviews)): ?>
<section id="reviews">
    <h2><?= Yii::t('app', 'Reviews') ?></h2>
    <div class="reviews-slider-outer">
        <div class="reviews-slider">
            <?php foreach ($language->reviews as $review): ?>
            <div class="review-item-slide">
                <div class="review-item">
                    <div class="review-item-img">
                        <img src="/img/reviews/<?= $review->img ?>">
                    </div>
                    <div class="review-item-description">
                        <span class="h3"><?= $review->name ?></span>
                        <p class="revirw-item-text">
                            <?= $review->text ?>
                            <!--We have been cooperating with Arctic Air for a very long time.
                            We recommend as a company that provides a quality product.
                            Over the years of cooperation, delivered orders in time.--></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
<!--            <div class="review-item-slide">-->
<!--                <div class="review-item">-->
<!--                    <div class="review-item-img">-->
<!--                        <img src="/img/reviews/stefan.jpg">-->
<!--                    </div>-->
<!--                    <div class="review-item-description">-->
<!--                        <span class="h3">Ștefan Rădulescu</span>-->
<!--                        <p class="revirw-item-text"><!--The quality of the product is very satisfied. Feel free to recommend-->
<!--                            the company. Thank you for your cooperation!Aici  puteți comanda 1 , 10 sau chiar 100 de baloane.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="review-item-slide">-->
<!--                <div class="review-item">-->
<!--                    <div class="review-item-img">-->
<!--                        <img src="/img/reviews/adrian.jpg">-->
<!--                    </div>-->
<!--                    <div class="review-item-description">-->
<!--                        <span class="h3">Adrian Barbu</span>-->
<!--                        <p class="revirw-item-text">Managerul rapid m-a sunat, mi-a plasat imediat comanda și ne-am inteles de livrare. Acum aștept coletul. Sunt satisfăcut de  serviciile oferite de Arctic Air.<!--Very pleased with the service of Arctic Air, previously it was very-->
<!--                            difficult to find a company that would deliver orders on time! Provide a quality mark, a-->
<!--                            very responsible company.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

            <!--            <div class="review-item-slide">-->
            <!--                <div class="review-item">-->
            <!--                    <div class="review-item-img">-->
            <!--                        <img src="/img/reviews/Ellipse.png">-->
            <!--                    </div>-->
            <!--                    <div class="review-item-description">-->
            <!--                        <span class="h3">Lorem ipsum dolor</span>-->
            <!--                        <p class="revirw-item-text">-->
            <!--                            Over the years of cooperation with ArcticAir, we remained and remain satisfied with their-->
            <!--                            products. Thanks to ArcticAir for the quality!</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="review-item-slide">-->
            <!--                <div class="review-item">-->
            <!--                    <div class="review-item-img">-->
            <!--                        <img src="/img/reviews/Ellipse.png">-->
            <!--                    </div>-->
            <!--                    <div class="review-item-description">-->
            <!--                        <span class="h3">Lorem ipsum dolor</span>-->
            <!--                        <p class="revirw-item-text">-->
            <!--                            The big advantage of the company is the constant availability of goods in stock, we-->
            <!--                            recommend!</p>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
        </div>
        <!-- 			<div class="slider-nav slider-prev" id="reviews-slider-prev"></div>
                    <div class="slider-nav slider-next" id="reviews-slider-next"></div> -->
    </div>
    <button class="btn blue" id="open-feedback-form"><?= Yii::t('app', 'Write Feedback') ?></button>
</section>
<?php endif; ?>
<section id="makeorder">
    <div class="snownsteam" id="snow-makeorder"></div>
    <h2 id="anchor-makeorder"><?= Yii::t('app', 'Make Order') ?></h2>
    <div id="makeorder-outer">
        <div class="makeorder-row">
            <div></div>
            <div><?= Yii::t('app', 'Name') ?></div>
            <div><?= Yii::t('app', 'Quantity') ?></div>
            <div><?= Yii::t('app', 'Price') ?></div>
            <div><?= Yii::t('app', 'Amount') ?></div>
        </div>
        <?php foreach ($language->products as $product): ?>
        <div class="makeorder-row" data-order-model="<?= $product->model ?>">
            <div>
                <img class="makeorder-img" src="/img/uploads/<?= $product->img ?>">
            </div>
            <div class="makeorder-title">
                <?= $product->name ?> <span><?= $product->model ?></span> <span class="makeorder-weight">0</span>
            </div>
            <div class="makeorder-quantity">
                <button class="minus"></button>
                <input type="number" name="amount" value="0">
                <button class="plus"></button>
            </div>
            <div class="makeorder-price price"><?= $product->price ?>
                <!-- Type of currency-->
                <span class="currency"><?= $currency ?></span>
            </div>
            <div class="makeorder-amount">0
                <span class="currency"><?= $currency ?></span>
            </div>
        </div>
        <?php endforeach; ?>
        <hr>
        <div class="makeorder-row makeorder-total">
            <div></div>
            <div class="h3"><?= Yii::t('app', 'Together') ?></div>
            <div class="makeorder-quantity-together">
<!--                <span class="quantity">Cantitate</span>-->
                <span class="input-style" id="together-amount">0</span>
            </div>
            <div></div>
            <div>
<!--                <span class="total">Total</span>-->
                <span class="input-style price" id="together-price">0</span><span class="currency"><?= $currency ?></span>
            </div>
        </div>

        <form action="" method="post" id="sendobj">
            <input id="object" type="hidden" name="object">
        </form>

        <button class="btn blue" name="value" value="makeorder" form="sendobj"><?= Yii::t('app', 'Make Order') ?></button>
    </div>
    <div id="row-mail">
        <?php foreach ($language->settings as $setting): ?>
            <?php if ($setting->name === 'Email'): ?>
                <a class="mail" href="mailto:<?= $setting->text ?>">
                    <div class="mail-img"></div>
                    <?= $setting->text ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>
<div id="eclipse"></div>

<div class="modal form" id="callback-form-outer">
    <div class="slider-nav slider-prev close-form" id="close-callback-form"></div>
    <span class="h2"><?= Yii::t('app', 'We’ll call you back') ?></span>
    <form action="" method="post" id="callback-form">
        <div class="input">
            <label><?= Yii::t('app', 'First Name') ?></label>
            <input type="text" name="name" placeholder="<?= Yii::t('app', 'Enter your first name') ?>">
        </div>
        <div class="input">
            <label><?= Yii::t('app', 'Your City') ?></label>
            <input type="text" name="city" placeholder="<?= Yii::t('app', 'Enter your city') ?>">
        </div>
        <div class="input">
            <label><?= Yii::t('app', 'Phone Number') ?></label>
            <input type="text" name="tel" placeholder="<?= Yii::t('app', 'Enter your phone number') ?>">
        </div>
    </form>
    <button class="btn blue" name="value" value="callback" form="callback-form"><?= Yii::t('app', 'Send') ?></button>
</div>

<div class="modal form" id="feedback-form-outer">
    <div class="slider-nav slider-prev close-form" id="close-feedback-form"></div>
    <span class="h2"><?= Yii::t('app', 'Write feedback') ?></span>
    <form action="" method="post" id="feedback-form">
        <div class="input-row">
            <div class="input">
                <label><?= Yii::t('app', 'First Name') ?></label>
                <input type="text" name="firstname" placeholder="<?= Yii::t('app', 'Enter your first name') ?>">
            </div>
            <div class="input">
                <label><?= Yii::t('app', 'Second Name') ?></label>
                <input type="text" name="secondname" placeholder="<?= Yii::t('app', 'Enter your second name') ?>">
            </div>
        </div>
        <div class="input-row">
            <label class="file">
                <span><?= Yii::t('app', 'Attach Image') ?></span>
                <input type="file" name="image">
            </label>
        </div>
        <div class="input">
            <label><?= Yii::t('app', 'Message') ?></label>
            <textarea name="text"></textarea>
        </div>
    </form>
    <button class="btn blue" name="value" value="feedback" form="feedback-form"><?= Yii::t('app', 'Send') ?></button>
</div>

<button id="open-whatsapp"></button>
<div class="modal form" id="whatsapp-form-outer">
    <div class="slider-nav slider-prev close-form"></div>
    <span class="h2"><?= Yii::t('app', 'Write Message') ?></span>
    <form action="" method="post" id="whatsapp-form">
        <div class="input-row">
            <div class="input">
                <label><?= Yii::t('app', 'First Name') ?></label>
                <input type="text" name="name" placeholder="<?= Yii::t('app', 'Enter your first name') ?>">
            </div>
            <div class="input">
                <label><?= Yii::t('app', 'Your City') ?></label>
                <input type="text" name="city" placeholder="<?= Yii::t('app', 'Enter your city') ?>">
            </div>
        </div>
        <div class="input">
            <label><?= Yii::t('app', 'Phone Number') ?></label>
            <input type="tel" name="tel" placeholder="<?= Yii::t('app', 'Enter your phone number') ?>">
        </div>
        <div class="input">
            <label><?= Yii::t('app', 'Message') ?></label>
            <textarea name="text"></textarea>
        </div>
    </form>
    <button class="btn green" name="value" value="whatsapp" form="whatsapp-form"><?= Yii::t('app', 'Send') ?></button>
</div>
<?php
$arr = [];
foreach ($language->products as $product){
    $arr[$product->model] = [
        'count' => 0,
        'price' => (integer)$product->price,
        'weight' => (float)$product->weight
    ];
}

$json = json_encode($arr);
?>
<script>
    var obj = <?= $json ?>;
    var Models = obj;
    Models.arr = false;
    Models.count = 0;
    Models.total = 0;
</script>

<!-- 	<div class="modal" id="modal-certificates">
		<div class="slider-nav slider-prev close-form" id="close-certificates-modal"></div>
		<span class="h2">Certificates</span>
		<div class="certificates-row">
			<a class="certificate-item" href="" target="_blank">
				<img src="/assets/img/ballons/blue512.png" alt="134A">
				<span class="h3">ArcticAir 134A</span>
			</a>
			<a class="certificate-item" href="" target="_blank">
				<img src="/assets/img/ballons/orange512.png" alt="134A">
				<span class="h3">ArcticAir 404A</span>
			</a>
			<a class="certificate-item" href="" target="_blank">
				<img src="/assets/img/ballons/aqua512.png" alt="134A">
				<span class="h3">ArcticAir 507</span>
			</a>
			<a class="certificate-item" href="" target="_blank">
				<img src="/assets/img/ballons/pink512.png" alt="134A">
				<span class="h3">ArcticAir 410A</span>
			</a>
			<a class="certificate-item" href="" target="_blank">
				<img src="/assets/img/ballons/red512.png" alt="134A">
				<span class="h3">ArcticAir 407C</span>
			</a>
		</div>
	</div> -->

<!--

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

-->