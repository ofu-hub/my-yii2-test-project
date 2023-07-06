<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Добавить клиента';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addClient">
    <h1><?= Html::encode($this->title) ?></h1>


<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Клиент добавлен!
        </div>

<?php else: ?>

    <div class="row">
        <div class="col-lg-5">
            
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'fio')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'passport_id') ?>
                <?= $form->field($model, 'series') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?php endif; ?>