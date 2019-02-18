<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 */

namespace codexten\yii\metronic4\bundles;

use yii\web\AssetBundle;

/**
 * Class BaseAssetBundle
 *
 * @package codexten\yii\metronic4\bundles
 * @author Jomon Johnson <jomon@entero.in>
 */
class BaseAssetBundle extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = \Yii::$app->params['metronic4.asset.path'];

        foreach ($this->css as $k => $v) {
            if (strpos($v, '.min.css') === false) {
                $fileName = str_replace('.css', '.min.css', $v);
                $newFile = \Yii::getAlias($this->sourcePath) . '/' . $fileName;
                if (!file_exists($newFile)) {
                    $fileName = $v;
                }
                $this->css[$k] = defined(YII_ENV_DEV) ? $v : $fileName;
            }
        }
        foreach ($this->js as $k => $v) {
            if (strpos($v, '.min.js') === false) {
                $fileName = str_replace('.js', '.min.js', $v);
                $newFile = \Yii::getAlias($this->sourcePath) . '/' . $fileName;
                if (!file_exists($newFile)) {
                    $fileName = $v;
                }
                $this->js[$k] = defined(YII_ENV_DEV) ? $v : $fileName;
            }
        }
        parent::init();
    }
}