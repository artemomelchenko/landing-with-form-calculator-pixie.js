<?php
//
///* @var $this \yii\web\View */
///* @var $content string */
//
//use backend\assets\AppAsset;
//use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;
//use common\widgets\Alert;
//
//AppAsset::register($this);
//?>
<!--    --><?php
//
//
//    if (Yii::$app->user->isGuest) {
////        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
//    } else {
//        NavBar::begin([
//            'brandLabel' => Yii::$app->name,
//            'brandUrl' => Yii::$app->homeUrl,
//            'options' => [
//                'class' => 'navbar-inverse navbar-fixed-top',
//            ],
//        ]);
//
//        $menuItems = [
//            ['label' => 'Home', 'url' => ['/site/index']],
//        ];
//
//        $menuItems[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                'Logout (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';
//
//        echo Nav::widget([
//            'options' => ['class' => 'navbar-nav navbar-right'],
//            'items' => $menuItems,
//        ]);
//        NavBar::end();
//    }
//
//    ?>
<!--        --><?//= Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
<!--        --><?//= Alert::widget() ?>
<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md' ?>" >
<?php $this->beginBody(); ?>

<div class="container body">

    <div class="main_container">
        <?php if (!Yii::$app->user->isGuest) { ?>
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title"><i class="fa fa-home"></i> <span>Arctic Air</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
<!--                    <div class="profile_pic">-->
<!--                        --><?//= Html::img('/img/logo.png',[
////                            'style' => 'width:128;',
//                            'class' => 'img-circle profile_img'
//                        ]); ?>
<!--                    </div>-->
<!--                    <div class="profile_info">-->
<!--                        <span>Welcome,</span>-->
<!--                        <h2>John Doe</h2>-->
<!--                    </div>-->
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
<!--                        <h3>General</h3>-->
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "?????????????? ????????????????????????", "url" => "/admin", "icon" => "columns"],
                                    ["label" => "????????????", "url" => ["products/index"], "icon" => "shopping-cart"],
                                    ["label" => "??????????????????", "url" => ["settings/index"], "icon" => "wrench"],
                                    ["label" => "????????????", "url" => ["reviews/index"], "icon" => "comments"],
                                    ["label" => "????????????????????", "url" => ["applications/index"], "icon" => "font-awesome"],
//                                    [
//                                        "label" => "Widgets",
//                                        "icon" => "th",
//                                        "url" => "#",
//                                        "items" => [
//                                            ["label" => "Menu", "url" => ["site/menu"]],
//                                            ["label" => "Panel", "url" => ["site/panel"]],
//                                        ],
//                                    ],
//                                    [
//                                        "label" => "Badges",
//                                        "url" => "#",
//                                        "icon" => "table",
//                                        "items" => [
//                                            [
//                                                "label" => "Default",
//                                                "url" => "#",
//                                                "badge" => "123",
//                                            ],
//                                            [
//                                                "label" => "Success",
//                                                "url" => "#",
//                                                "badge" => "new",
//                                                "badgeOptions" => ["class" => "label-success"],
//                                            ],
//                                            [
//                                                "label" => "Danger",
//                                                "url" => "#",
//                                                "badge" => "!",
//                                                "badgeOptions" => ["class" => "label-danger"],
//                                            ],
//                                        ],
//                                    ],
//                                    [
//                                        "label" => "Multilevel",
//                                        "url" => "#",
//                                        "icon" => "table",
//                                        "items" => [
//                                            [
//                                                "label" => "Second level 1",
//                                                "url" => "#",
//                                            ],
//                                            [
//                                                "label" => "Second level 2",
//                                                "url" => "#",
//                                                "items" => [
//                                                    [
//                                                        "label" => "Third level 1",
//                                                        "url" => "#",
//                                                    ],
//                                                    [
//                                                        "label" => "Third level 2",
//                                                        "url" => "#",
//                                                    ],
//                                                ],
//                                            ],
//                                        ],
//                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="http://placehold.it/128x128" alt="">John Doe
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li><?= Html::a('<i class="fa fa-sign-out pull-right"></i> Log Out', ['site/logout'], ['data' => ['method' => 'post']]) ?>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                                        <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="/">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->
<?php } ?>
        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>

