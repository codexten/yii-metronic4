<?php

/**
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace codexten\yii\metronic4\bundles;

class DatePickerAsset extends BaseAssetBundle {

    public static $extraJs = [];

    public $js = [
        'plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
    ];
    public $css = [
        'plugins/bootstrap-datepicker/css/bootstrap-datepicker.css',
        'plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css',
    ];
    public $depends = [
        'codexten\yii\metronic4\bundles\CoreAsset',
    ];

    public function init()
    {
        $this->js = array_merge($this->js, static::$extraJs);
    }

}
