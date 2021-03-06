<?php

/**
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace codexten\yii\metronic4\bundles;


class TreeAsset extends BaseAssetBundle {

    /**
     * @var array CSS
     */
    public $css = [
        'global/plugins/jstree/dist/themes/default/style.min.css',
    ];

    public $js = [  
        'global/plugins/jstree/dist/jstree.min.js',
    ];
    
    /**
     * @var array depends on
     */
    public $depends = [
        'codexten\yii\metronic4\bundles\CoreAsset',
    ];

}
