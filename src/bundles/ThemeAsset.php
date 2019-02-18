<?php
/**
 * @link http://www.digitaldeals.cz/
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace codexten\yii\metronic4\bundles;

use Yii;
use codexten\yii\metronic4\Theme;

class ThemeAsset extends BaseAssetBundle
{

    /**
     * @var array depended bundles
     */
    public $depends = [
        'codexten\yii\metronic4\bundles\CoreAsset',
        'codexten\yii\metronic4\bundles\StyleBasedAsset',
        'entero\web\AssetBundle',
    ];

    /**
     * @var array css assets
     */
    public $css = [
        'layouts/{version}/css/layout.css',
        'layouts/{version}/css/themes/{theme}.css',
        'layouts/{version}/css/custom.css',
    ];

    /**
     * @var array js assets
     */
    public $js = [
        'global/scripts/app.js',
        'layouts/{version}/scripts/layout.js',
        'layouts/{version}/scripts/demo.js',
        'layouts/global/scripts/quick-sidebar.js',
        'layouts/global/scripts/quick-nav.js',
    ];

    /**
     * @var array addons assets
     */
    public $addons = [];

    /**
     * Inits bundle
     */
    public function init()
    {
        $this->_handleSourcePath();

        $this->_handleAddons();

        $this->_handleDynamicCss();

        $this->_handleDynamicJs();

        return parent::init();
    }

    /**
     * Parses source path
     */
    private function _handleSourcePath()
    {
        if (Theme::getComponent()) {
            Theme::getComponent()->parseAssetsParams($this->sourcePath);
        }
    }

    /**
     * Parses dynamic css
     */
    private function _handleDynamicCss()
    {
        $component = Theme::getComponent();

        if ($component) {
            array_walk($this->css, [$component, 'parseAssetsParams']);
        }
    }

    /**
     * Parses dynamic js
     */
    private function _handleDynamicJs()
    {
        $component = Theme::getComponent();

        if ($component) {
            array_walk($this->js, [$component, 'parseAssetsParams']);
        }
    }

    private function _handleAddons()
    {
        $controller = Yii::$app->controller->id . '/' . Yii::$app->controller->action->id;
        if (array_key_exists($controller, $this->addons)) {
            $additional = $this->addons[$controller];
            if (array_key_exists('js', $additional) && is_array($additional['js'])) {
                $this->js = array_merge($this->js, $additional['js']);
            }
            if (array_key_exists('css', $additional) && is_array($additional['css'])) {
                $this->css = array_merge($this->css, $additional['css']);
            }
        }
    }
}