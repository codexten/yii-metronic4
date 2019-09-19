<?php
/**
 * @var yii\web\View $this
 * @var codexten\yii\modules\auth\models\LoginForm $model
 * @var codexten\yii\modules\auth\Module $module
 */

$this->title = Yii::t('codexten:user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;

$this->params['body']['options'] = ['class' => 'login'];

\codexten\yii\metronic4\bundles\LoginAssetBundle::register($this);

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="logo">

    <a href="<?= Url::to(['/']) ?>">

        <?= Html::img('/img/logo.png', ['alt' => Yii::$app->name, 'class' => 'logo-default',]) ?>

    </a>

</div>
<div class="content">

    <?= $this->render('@codexten/yii/modules/auth/views/account/login/_form.php', [
        'model' => $model,
        'module' => $module,
    ]) ?>

</div>
