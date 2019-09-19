<?php

namespace codexten\yii\metronic4\bundles;

use codexten\yii\metronic4\Theme;

/**
 * Class BaseAssetBundle
 *
 * @package codexten\yii\metronic4\bundles
 */
class LoginAssetBundle extends BaseAssetBundle
{
    public $depends = [
        ThemeAsset::class,
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $loginPage = Theme::getComponent()->loginPage;
        if ($loginPage) {
            $this->css = [
                "pages/css/{$loginPage}.min.css",
            ];
        }
        parent::init();
    }
}