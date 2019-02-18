<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Jomon Johnson <jomon@entero.in>
 */

use yii\web\View;
use codexten\yii\metronic4\Theme;

/* @var $this View */

?>

<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">

    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">

        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/">
                <img src="/img/logo.png" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
                <span></span>
            </div>
        </div>
        <!-- END LOGO -->

        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:" class="menu-toggler responsive-toggler" data-toggle="collapse"
           data-target=".navbar-collapse">
            <span></span>
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">

                <?php if (Theme::getComponent()->topBar['notification']['visible']): ?>

                    <?= $this->render('notifications') ?>

                <?php endIf; ?>

                <?php if (Theme::getComponent()->topBar['notification']['visible']): ?>

                    <?= $this->render('inbox') ?>

                <?php endIf; ?>

                <?php if (Theme::getComponent()->topBar['notification']['visible']): ?>

                    <?= $this->render('todo') ?>

                <?php endIf; ?>

                <?php if (Theme::getComponent()->topBar['userDropdown']['visible'] && !Yii::$app->user->isGuest): ?>

                    <?= $this->render('user-dropdown') ?>

                <?php endIf; ?>

                <?php if (Theme::getComponent()->showQuickSidebar): ?>

                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="javascript:" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->

                <?php endIf; ?>

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->

    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
