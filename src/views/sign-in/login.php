<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \codexten\yii\web\admin\models\LoginForm */

$this->title = Yii::t('codexten:metronic4', 'Sign In');
app()->view->theme->bodyOptions['class'] = 'login';

?>

<div class="logo">

    <a href="<?= Url::to(['/']) ?>">

        <?= Html::img('/img/logo.png', ['alt' => Yii::$app->name, 'class' => 'logo-default',]) ?>

    </a>

</div>
<div class="content">

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'login-form']]); ?>

    <h3 class="form-title font-green">

        <?= Yii::t('codexten:metronic4', 'Sign In') ?>

    </h3>

    <?= $form->field($model, 'username')
        ->textInput(['placeholder' => $model->getAttributeLabel('username')])->label(false) ?>

    <?= $form->field($model, 'password')
        ->passwordInput(['placeholder' => $model->getAttributeLabel('Password')])->label(false) ?>

    <div class="form-actions">

        <?= Html::submitButton(Yii::t('codexten:metronic4', 'Login'), ['class' => 'btn green uppercase']) ?>

        <label class="rememberme check mt-checkbox mt-checkbox-outline">

            <?= Html::checkbox(Html::getInputName($model, 'rememberMe')) ?>

            Remember <span></span>

        </label>

        <a href="<?= Url::to(['/sign-in/request-password-reset']) ?>" class="forget-password">Forgot Password?</a>

    </div>

    <?php ActiveForm::end(); ?>

</div>
<div class="copyright">

    <?= asDate(time(), 'Y') ?> &copy; <?= Yii::$app->name ?>

</div>

