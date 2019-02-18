<?php
/**
 * Created by PhpStorm.
 * User: jomon
 * Date: 8/11/18
 * Time: 12:15 PM
 */

use codexten\yii\metronic4\bundles\ThemeAsset;
use codexten\yii\metronic4\Theme;

return [
    'components' => [
        'i18n' => [
            'translations' => [
                'codexten:metronic4' => [
                    'class' => \yii\i18n\PhpMessageSource::class,
                    'basePath' => '@codexten/yii/metronic4/messages',
                ],
            ],
        ],
        'themeManager' => [
            'defaultTheme' => 'metronic',
            'themes' => [
                'metronic' => [
                    'class' => Theme::class,
                    'theme' => 'darkblue',
                    'style' => Theme::STYLE_SQUARE,
                    'pathMap' => [
                        '@app/views' => [
                            '@codexten/yii/metronic4/views',
                        ],
                        '@app/views/layouts' => [
                            '@codexten/yii/metronic4/views/layouts',
                        ],
                        '@entero/module/user/views' => [
                            '@codexten/yii/metronic4/views/_modules/user',
                            //To fix layout issue of user module, while accessing `/account/login`
                            '@codexten/yii/metronic4/views',
                        ],
                    ],
                    'assets' => [
                        ThemeAsset::class,
                    ],
                ],
            ],
        ],
    ],
    'container' => [
        'definitions' => [
            \codexten\yii\metronic4\widgets\SidebarMenu::class => [
                'menu' => [
                    'class' => \codexten\yii\metronic4\menus\SidebarMenu::class,
                ],
            ],
        ],
    ],
];