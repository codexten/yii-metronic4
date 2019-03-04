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
?>

<div class="logo">
    <a href="index.html">
        <?= Yii::$app->name ?>
    </a>
</div>
<div class="content">

    <?= $this->render('@codexten/yii/modules/auth/views/account/login/_form.php', [
        'model' => $model,
        'module' => $module,
    ]) ?>
    
</div>
