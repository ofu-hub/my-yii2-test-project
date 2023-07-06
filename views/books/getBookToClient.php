<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use app\models\Book;
use app\models\Client;
use app\models\User;

$this->title = 'Выдать книгу клиенту';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="getBookToClient">
    <h1><?= Html::encode($this->title) ?></h1>


<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Книга выдана!
        </div>

<?php else: ?>

    <div class="row">
        <div class="col-lg-5">
            
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'client_id')->textInput(['autofocus' => true])->dropDownList(ArrayHelper::map(Client::find()->all(),'id','fio'),['prompt'=>'Выберите клиента']);?>
                <?= $form->field($model, 'book_id')->dropDownList(ArrayHelper::map(Book::find()->where(['isCheck' => true])->all(),'id','name'),['prompt'=>'Выберите книгу']);?>
                <?= $form->field($model, 'employee_id')->dropDownList(ArrayHelper::map(User::find()->where(['role' => 'employee'])->all(),'id','username'),['prompt'=>'Выберите сотрудника']);?>
                <?= $form->field($model, 'period')->textInput(['type' => 'number']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?php endif; ?>