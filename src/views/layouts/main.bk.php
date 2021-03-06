<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Jomon Johnson <jomonjohnson.dev@gmail.com>
 */

use yii\helpers\Html;
use codexten\yii\metronic4\helpers\Layout;
use codexten\yii\metronic4\widgets\Menu;
use codexten\yii\metronic4\widgets\NavBar;
use codexten\yii\metronic4\widgets\Nav;
use codexten\yii\metronic4\widgets\Breadcrumbs;
use codexten\yii\metronic4\widgets\Button;
use codexten\yii\metronic4\widgets\HorizontalMenu;
use codexten\yii\metronic4\Theme;
use codexten\yii\metronic4\widgets\Badge;

/** @var $this \yii\web\View */

$this->beginPage();
Theme::registerThemeAsset($this);
?>
    <!DOCTYPE html>
    <!--[if IE 8]>
    <html lang="en" class="ie8"> <![endif]-->
    <!--[if IE 9]>
    <html lang="en" class="ie9"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en"> <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <title><?= Html::encode($this->title) ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
        <meta name="MobileOptimized" content="320">
        <link rel="shortcut icon" href="favicon.ico"/>
        <?php $this->head() ?>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body <?= Layout::getHtmlOptions('body') ?> >
    <?php $this->beginBody() ?>
    <?php
    NavBar::begin(
        [
            'brandLabel' => 'My Company',
            'brandLogoUrl' => Theme::getAssetsUrl($this) . '/img/logo.png',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => Layout::getHtmlOptions('header', false),
        ]
    );
    echo HorizontalMenu::widget(
        [
            'items' => [
                [
                    'label' => 'Mega menu',
                    'type' => HorizontalMenu::ITEM_TYPE_MEGA,
                    'items' => [
                        [
                            //'options' => '',
                            'label' => 'Layouts',
                            'items' => [
                                ['label' => 'Promo Page', 'url' => ['/site/index']],
                                ['label' => 'Email Templates'],
                            ],
                        ],
                        [
                            //'options' => '',
                            'label' => 'Layouts 2',
                            'items' => [
                                ['label' => 'Promo Page 2'],
                                ['label' => 'Email Templates 2'],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Full Mega menu',
                    'type' => HorizontalMenu::ITEM_TYPE_FULL_MEGA,
                    'text' => \codexten\yii\metronic4\widgets\Accordion::widget(
                        [
                            'items' => [
                                [
                                    'header' => 'Item 1',
                                    'content' => 'Content 1...',
                                    // open its content by default
                                    'contentOptions' => ['class' => 'in'],
                                    'type' => \codexten\yii\metronic4\widgets\Accordion::ITEM_TYPE_SUCCESS,
                                ],
                                [
                                    'header' => 'Item 2',
                                    'content' => 'Content 2...',
                                ],
                            ],
                            'itemConfig' => ['showIcon' => true],
                        ]
                    ),
                    'items' => [
                        [
                            //'options' => '',
                            'label' => 'Layouts',
                            'items' => [
                                ['label' => 'Promo Page', 'url' => ['/site/index']],
                                ['label' => 'Email Templates'],
                            ],
                        ],
                        [
                            //'options' => '',
                            'label' => 'Layouts 2',
                            'items' => [
                                ['label' => 'Promo Page 2'],
                                ['label' => 'Email Templates 2'],
                            ],
                        ],
                    ],
                ],
                [

                    'label' => 'Home',
                    'items' => [
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                    ],
                ],
                [
                    'label' => 'Home 2',
                    'url' => ['/site/index'],
                    'items' => [
                        [
                            'badge' => Badge::widget(['label' => 'Новинка', 'round' => false]),
                            'label' => 'About',
                            'url' => ['/site/about'],
                        ],
                        ['label' => 'About', 'url' => ['/site/about']],
                        [
                            'label' => 'About',
                            'url' => ['/site/about'],
                            'items' => [
                                ['label' => 'About', 'url' => ['/site/about']],
                                ['label' => 'About', 'url' => ['/site/about']],
                                ['label' => 'Index', 'url' => ['/site/index']],
                            ],
                        ],
                        ['label' => 'About', 'url' => ['/site/about']],
                    ],
                ],
            ],
        ]
    );
    echo Nav::widget(
        [
            'items' => [
                [
                    'icon' => 'fa fa-warning',
                    'badge' => Badge::widget(['label' => 'xxx']),
                    'label' => 'Home',
                    'url' => ['/site/index'],
                    // dropdown title
                    'title' => 'xx',
                    'more' => ['label' => 'xxx', 'url' => '/', 'icon' => 'm-icon-swapright'],
                    // scroller
                    'scroller' => ['height' => 200],
                    // end dropdown
                    'items' => [
                        ['label' => 'About', 'url' => ['/site/aboutz']],
                        ['label' => 'About', 'url' => ['/site/aboutz']],
                        ['label' => 'About', 'url' => ['/site/aboutz']],
                        ['label' => 'About', 'url' => ['/site/aboutz']],
                        ['label' => 'About', 'url' => ['/site/aboutz']],
                        ['label' => 'About', 'url' => ['/site/aboutz']],
                    ],
                ],
                [
                    'label' => Nav::userItem('Bob Nilson', Theme::getAssetsUrl($this) . '/img/avatar1_small.jpg'),
                    'url' => '#',
                    'type' => 'user',
                    'items' => [
                        [
                            'icon' => 'fa fa-calendar',
                            'label' => 'About',
                            'url' => ['/site/about'],
                            'badge' => Badge::widget(['label' => 'xxx']),
                        ],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['divider'],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'About', 'url' => ['/site/about']],
                    ],
                ],
                // [ 'label' => 'Contact', 'url' => ['/site/contact']],
            ],
        ]
    );
    NavBar::end();
    ?>
    <?=
    (Theme::getComponent() && Theme::getComponent()->layoutOption == Theme::LAYOUT_BOXED) ?
        Html::beginTag('div', ['class' => 'container']) : '';
    ?>
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <?=
        Menu::widget(
            [
                'visible' => true,
                'items' => [
                    // Important: you need to specify url as 'controller/action',
                    // not just as 'controller' even if default action is used.
                    ['icon' => 'fa fa-home', 'label' => 'Home', 'url' => ['site/indea']],
                    // 'Products' menu item will be selected as long as the route is 'product/index'
                    [
                        'icon' => 'fa fa-cogs',
                        'badge' => Badge::widget(['label' => 'New', 'round' => false, 'type' => Badge::TYPE_SUCCESS]),
                        'label' => 'Products',
                        'url' => '#',
                        'items' => [
                            ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
                            [
                                'label' => 'Home',
                                'url' => '#',
                                'items' => [
                                    [
                                        'icon' => 'fa fa-cogs',
                                        'label' => 'Products',
                                        'url' => ['site/index'],
                                        'badge' => Badge::widget(
                                            ['label' => 'New', 'round' => false, 'type' => Badge::TYPE_SUCCESS]
                                        ),
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'icon' => 'fa fa-bookmark-o',
                        'label' => 'UI Features',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Buttons & Icons',
                                'url' => ['site/'],
                            ],
                        ],
                    ],
                    [
                        'icon' => 'fa fa-user',
                        'label' => 'Login',
                        'url' => ['site/login'],
                        'visible' => Yii::$app->user->isGuest,
                    ],
                    [
                        'icon' => 'fa fa-user',
                        'label' => 'Login',
                        'url' => ['site/login'],
                        'visible' => Yii::$app->user->isGuest,
                    ],
                ],
            ]
        );
        ?>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!-- BEGIN PAGE HEADER-->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">
                            <?= Html::encode($this->title) ?>
                            <small><?= Html::encode($this->title) ?></small>
                        </h3>
                        <?=
                        Breadcrumbs::widget(
                            [
                                'actions' => [
                                    'label' => 'Action',
                                    'button' => [
                                        'type' => Button::TYPE_PRIMARY,
                                        'options' => ['data-hover' => 'dropdown', 'delay' => '1000'],
                                    ],
                                    'dropdown' => [
                                        'items' => [
                                            ['label' => 'DropdownA', 'url' => '/'],
                                            ['divider'],
                                            ['label' => 'DropdownB', 'url' => '#'],
                                        ],
                                    ],
                                ],
                                'homeLink' => [
                                    'label' => 'Home',
                                    'icon' => 'fa fa-home',
                                    'url' => ['/'],
                                ],
                                'links' => [
                                    [
                                        'icon' => 'fa fa-cogs',
                                        'label' => 'Sample Post',
                                        'url' => ['post/edit', 'id' => 1],
                                    ],
                                    'Edit',
                                ],
                            ]
                        );
                        ?>
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row">
                    <div class="col-md-12">
                        <?= $content ?>
                    </div>
                </div>
                <!-- END PAGE CONTENT-->
            </div>
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="footer">
        <div class="footer-inner">
            <?= date('Y') ?> &copy; YiiMetronic.
        </div>
        <div class="footer-tools">
                <span class="go-top">
                    <i class="fa fa-angle-up"></i>
                </span>
        </div>
    </div>

    <?= (Theme::getComponent() && Theme::getComponent()->layoutOption == Theme::LAYOUT_BOXED) ? Html::endTag('div') : ''; ?>
    <?php $this->endBody() ?>
    </body>
    <!-- END BODY -->
    </html>
<?php $this->endPage() ?>