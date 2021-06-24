<?php

$this->title = 'Arctic Air';
?>
<?php $this->beginBlock('pixel'); ?>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '390527834937600');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=390527834937600&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
<?php $this->endBlock(); ?>
<style type="text/css">
    header:after {
        bottom: 8vh!important;
        height: 20vh!important;
    }
</style>
<section class="success snownsteam">
    <div class="snow-front"></div>
    <div class="snow-back"></div>
    <div class="snow-back-second"></div>
    <div class="pinguins"></div>
    <div id="header-smoke"></div>
    <div class="front-penguin"></div>
    <div class="main-penguin"></div>
    <div class="balon"></div>
    <div class="palm-left"></div>
    <div class="palm-right"></div>

    <div class="feedback-wrap">
        <div class="complete-wrap"></div>
        <div class="gratitude-wrap">
            <span>Vă mulțumim,</span>
            <span>cererea dvs. a fost acceptată!</span>
        </div>
        <div class="feedback">

            <span>Operatorii noștri</span>
            <span>Vă vor contacta cât mai curând.</span>
        </div>

        <a class="home-btn" href="/">
            <span>REVENIȚI ÎN SITE</span>
        </a>
    </div>
</section>

<div id="eclipse" class=""></div>
<div class="modal form" id="callback-form-outer">
    <div class="slider-nav slider-prev close-form" id="close-callback-form"></div>
    <span class="h2">We'll call back</span>
    <form action="" method="post" id="callback-form">
        <div class="input">
            <label>First name</label>
            <input type="text" name="name" placeholder="Enter your first name">
        </div>
        <div class="input">
            <label>Your city</label>
            <input type="text" name="city" placeholder="Enter your city">
        </div>
        <div class="input">
            <label>Phone number</label>
            <input type="text" name="tel" placeholder="Enter your phone number">
        </div>
    </form>
    <button class="btn blue" name="value" value="callback" form="callback-form">Send</button>
</div>

<script>
window.onload = function () {
    document.getElementById('preloader').classList.remove('active');

    function eventBtn() {
        $("#callback-btn").click(function() {
	    document.getElementById("eclipse").classList.add("active");
	    document.getElementById("callback-form-outer").classList.add("active");
	    document.body.classList.add("noscroll");
});
        $("#eclipse, .close-form").click(function() {
	    document.getElementById("eclipse").classList.remove("active");
	    document.getElementById("callback-form-outer").classList.remove("active");
});
    
}
    eventBtn();
}
</script>