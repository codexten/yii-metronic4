<?php
/**
 * @link http://www.digitaldeals.cz/
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace codexten\yii\metronic4\bundles;

use yii\helpers\ArrayHelper;
use codexten\yii\metronic4\Theme;

class StyleBasedAsset extends BaseAssetBundle
{

    /**
     * @var array depended bundles
     */
    public $depends = [
        'codexten\yii\metronic4\bundles\CoreAsset',
    ];

    /**
     * @var array css assets
     */
    public $css = [];

    /**
     * @var array style based css
     */
    private $styleBasedCss = [
        Theme::STYLE_SQUARE => [
            'global/css/components.css',
            'global/css/plugins.css',
        ],
        Theme::STYLE_ROUNDED => [
            'global/css/components-rounded.css',
            'global/css/plugins.css',
        ],
        Theme::STYLE_MATERIAL => [
            'global/css/components-md.css',
            'global/css/plugins-md.css',
        ],
    ];

    /**
     * Inits bundle
     */
    public function init()
    {
        $this->_handleStyleBased();

        return parent::init();
    }

    /**
     * Handles style based files
     */
    private function _handleStyleBased()
    {
        if (Theme::getComponent()) {
            $css = $this->styleBasedCss[Theme::getComponent()->style];
            $this->css = ArrayHelper::merge($css, $this->css);
        }
    }
}