<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 */

namespace codexten\yii\metronic4\bundles;

use codexten\yii\metronic4\Theme;

/**
 * Class BaseAssetBundle
 * @package codexten\yii\metronic4\bundles
 * @author Jomon Johnson <jomon@entero.in>
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