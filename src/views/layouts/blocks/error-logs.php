<?php
/**
 * @link https://entero.co.in/
 * @copyright Copyright (c) 2012 Entero Software Solutions Pvt.Ltd
 * @license https://entero.co.in/license/
 * @author Jomon Johnson <jomonjohnson.dev@gmail.com>
 */

use \codexten\yii\metronic4\widgets\Alert;
use yii\web\View;

/* @var $this View*/

$errorLogs = Yii::$app->session->getFlash('errorLogs', []);
?>

<?php foreach ($errorLogs as $errorLog): ?>

    <?php Alert::begin([
        'type' => Alert::TYPE_DANGER,

    ]) ?>

    <?php print_r($errorLog) ?>

    <?php Alert::end() ?>

<?php endForeach; ?>


