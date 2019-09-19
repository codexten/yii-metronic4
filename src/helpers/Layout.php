<?php

/**
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace codexten\yii\metronic4\helpers;

use codexten\yii\metronic4\Theme;
use yii\helpers\Html;

/**
 * Layout helper
 */
class Layout
{

    /**
     * Retrieves Html options
     * @param string $tag given tag
     * @param boolean $asString if return as string
     * @return type
     */
    public static function getHtmlOptions($tag, $options = [], $asString = false)
    {

        $callback = sprintf('static::_%sOptions', strtolower($tag));

        $htmlOptions = call_user_func($callback, $options);


        return $asString ? Html::renderTagAttributes($htmlOptions) : $htmlOptions;
    }

    /**
     * Adds body tag options
     * @param array $options given options
     */
    private static function _bodyOptions($options)
    {

        if (\Yii::$app->controller->layout == 'base') {
            Html::addCssClass($options, 'login');
        }

        Html::addCssClass($options, 'page-header-fixed page-content-white');

        if (Theme::getComponent() && Theme::STYLE_MATERIAL === Theme::getComponent()->style) {
            Html::addCssClass($options, 'page-md');
        }

        if (Theme::getComponent() && Theme::LAYOUT_BOXED === Theme::getComponent()->layoutOption) {
            Html::addCssClass($options, 'page-boxed');
        }

        if (Theme::getComponent() && Theme::HEADER_FIXED === Theme::getComponent()->headerOption) {
            Html::addCssClass($options, 'page-header-fixed');
        }

        if (Theme::getComponent() && Theme::SIDEBAR_POSITION_RIGHT === Theme::getComponent()->sidebarPosition) {
            Html::addCssClass($options, 'page-sidebar-reversed');
        }

        if (Theme::getComponent() && Theme::SIDEBAR_FIXED === Theme::getComponent()->sidebarOption) {
            Html::addCssClass($options, 'page-sidebar-fixed');
        }

        if (Theme::getComponent() && Theme::FOOTER_FIXED === Theme::getComponent()->footerOption) {
            Html::addCssClass($options, 'page-footer-fixed');
        }


        return $options;
    }

    /**
     * Adds header tag options
     * @param array $options given options
     */
    private static function _headerOptions($options)
    {
        Html::addCssClass($options, 'page-header navbar');

        if (Theme::getComponent() && Theme::HEADER_FIXED === Theme::getComponent()->headerOption) {
            Html::addCssClass($options, 'navbar-fixed-top');
        } else {
            Html::addCssClass($options, 'navbar-static-top');
        }

        return $options;
    }

    /**
     * Adds actions tag options
     * @param array $options given options
     */
    private static function _actionsOptions($options)
    {
        Html::addCssClass($options, 'page-actions');

        return $options;
    }

    /**
     * Adds top tag options
     * @param array $options given options
     */
    private static function _topOptions($options)
    {
        Html::addCssClass($options, 'page-top');

        return $options;
    }

    /**
     * Adds topmenu tag options
     * @param array $options given options
     */
    private static function _topmenuOptions($options)
    {
        Html::addCssClass($options, 'top-menu');

        return $options;
    }

    /**
     * Adds container tag options
     * @param array $options given options
     */
    private static function _containerOptions($options)
    {
        Html::addCssClass($options, 'container');

        return $options;
    }

    /**
     * Adds clearfix tag options
     * @param array $options given options
     */
    private static function _clearfixOptions($options)
    {
        Html::addCssClass($options, 'clearfix');

        return $options;
    }

}
