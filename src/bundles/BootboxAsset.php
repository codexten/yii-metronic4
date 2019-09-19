<?php
/**
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace codexten\yii\metronic4\bundles;

use Yii;

class BootboxAsset extends BaseAssetBundle {
    public $depends = [
        'codexten\yii\metronic4\bundles\CoreAsset',
    ];

    public $js = [
        'global/plugins/bootbox/bootbox.min.js',
    ];

    public static function overrideSystemConfirm()
    {
        Yii::$app->view->registerJs('
            yii.confirm = function(message, ok, cancel) {
                bootbox.confirm({
                    title: "Confirm",
                    message: message,
                    callback: function(result) { if (result) { !ok || ok(); } else { !cancel || cancel(); } }
                });
            }
        ');
    }
}