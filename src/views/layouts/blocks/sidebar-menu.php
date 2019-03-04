<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Ashlin A <ashlin@entero.in>
 * @author Jomon Johnson <jomonjohnson.dev@gmail.com>
 */

use codexten\yii\metronic4\widgets\SidebarMenu;
use yii\helpers\Url;
use yii\web\View;
use enyii\common\facades\UserSettings;
use yii\helpers\Html;

/* @var $this View */

//run set-sidebar-toggle action while clicking sidebar toggle button

//if (UserSettings::get('sidebar.closed') == true) {
//    Html::addCssClass($this->params['body']['options'], 'page-sidebar-closed');
//} else {
Html::removeCssClass($this->params['body']['options'], 'page-sidebar-closed');
//}
//$url = Url::to(['/user-settings/set-sidebar-toggle']);
//$script = <<< JS
//$(document).on('click','.page-header-inner .menu-toggler',function(){
//     $.ajax({  url: '{$url}',  data: {status: $('body').hasClass('page-sidebar-closed')},});
//});
//JS;
//$this->registerJs($script, View::POS_END);

$config = \codexten\yii\metronic4\Theme::getComponent()->sidebarMenuConfig;
?>

<?= SidebarMenu::widget($config) ?>