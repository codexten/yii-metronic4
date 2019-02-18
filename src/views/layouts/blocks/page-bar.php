<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Jomon Johnson <jomon@entero.in>
 */

use entero\helpers\ArrayHelper;
use codexten\yii\metronic4\widgets\Breadcrumbs;
use codexten\yii\metronic4\widgets\PageToolbar;
use yii\web\View;
use codexten\yii\metronic4\Theme;

/* @var $this View */
?>

<!-- BEGIN PAGE BAR -->
<div class="page-bar">

    <?php if (Theme::getComponent()->showPageTitle): ?>

        <?= $this->render('page-title') ?>

    <?php endIf; ?>

    <?= Breadcrumbs::widget([
        'homeLink' => [
            'label' => Yii::t('codexten:metronic4', 'Home'),
            'url' => Yii::$app->homeUrl,
        ],
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="page-toolbar">

        <?= PageToolbar::widget([
            'params' => ArrayHelper::getValue($this->params, 'pageToolBar') ?: []
        ]); ?>

    </div>
</div>
<!-- END PAGE BAR -->