<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Ashlin A <ashlin@entero.in>
 */

/* @var  $this \yii\web\View */
/* @var  $content string */
\codexten\yii\metronic4\bundles\LoginAssetBundle::register($this);

?>

<?php $this->beginContent('@codexten/yii/web/views/layouts/base.php'); ?>

<?= yii2mod\alert\Alert::widget(['useSessionFlash' => true]); ?>

<?= $content ?>

<?php $this->endContent(); ?>