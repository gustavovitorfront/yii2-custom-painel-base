<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="loginApp card">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
        </div>

        <div class="card-body" style="padding: 30px; padding-top: 10px; padding-bottom: 10px">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-12 col-form-label pl-0'],
                    'inputOptions' => ['class' => 'col-lg-12 form-control'],
                    'errorOptions' => ['class' => 'col-lg-12 invalid-feedback pl-0'],
                ],
            ]); ?>
            <?= $form->field($model, 'email')->textInput(['type' => 'email', 'autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"col-lg-3 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

        </div>

        <div class="card-footer">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>