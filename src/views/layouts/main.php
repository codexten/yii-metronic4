<?php
/** @var $this \yii\web\View */

use codexten\yii\metronic4\Theme;
use codexten\yii\metronic4\widgets\Menu;

$this->params['body']['options'] = \codexten\yii\metronic4\helpers\Layout::getHtmlOptions('body');
?>

<?php $this->beginContent('@codexten/yii/metronic4/views/layouts/base.php'); ?>

    <div class="page-wrapper">


        <?= $this->render('blocks/header') ?>

        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"></div>
        <!-- END HEADER & CONTENT DIVIDER -->

        <!-- BEGIN CONTAINER -->
        <div class="page-container">

            <!-- BEGIN SIDEBAR -->
            <?= $this->render('blocks/sidebar-menu') ?>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->

                    <?php if (Theme::getComponent()->showThemePanel): ?>

                        <?= $this->render('blocks/theme-panel') ?>

                    <?php endIf; ?>

                    <?php if (Theme::getComponent()->showPageBar): ?>

                        <?= $this->render('blocks/page-bar') ?>

                    <?php endIf; ?>

                    <!-- END PAGE HEADER-->

                    <?= $this->render('blocks/error-logs') ?>

                    <?= $content ?>

                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

            <?php if (Theme::getComponent()->showQuickSidebar): ?>

                <?= $this->render('blocks/quick-sidebar') ?>

            <?php endIf; ?>

        </div>
        <!-- END CONTAINER -->

        <?php if (Theme::getComponent()->showFooter): ?>

            <?= $this->render('blocks/footer') ?>

        <?php endIf; ?>

    </div>

<?php $this->endContent() ?>