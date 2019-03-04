<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Jomon Johnson <jomonjohnson.dev@gmail.com>
 */

use yii\bootstrap\Nav;
use yii\widgets\Menu;
use codexten\yii\metronic4\Theme;

?>

<!-- BEGIN USER LOGIN DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-user">
    <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
       data-close-others="true">
        <i class="fa fa-user" style="font-size: 20px;"></i>
        <span class="username username-hide-on-mobile"> <?= userIdentity()->username ?> </span>
        <i class="fa fa-angle-down"></i>
    </a>

    <?= Nav::widget([
        'options' => ['class' => 'dropdown-menu dropdown-menu-default'],
        'items' => Theme::getComponent()->topBar['userDropdown']['items'],
        'encodeLabels' => false,
    ]) ?>

</li>
<!-- END USER LOGIN DROPDOWN -->
