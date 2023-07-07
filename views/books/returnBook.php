<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use app\models\Client;

$this->title = 'Вернуть книгу';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="returnBook">
    <h1><?= Html::encode($this->title) ?></h1>


<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Книга возвращена!
        </div>

<?php else: ?>

    <div class="row">
        <div class="col-lg-5">
            
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'client_id')->textInput(['autofocus' => true])->dropDownList(
                    ArrayHelper::map(Client::getAll(),'id','fio'),['prompt'=>'Выберите клиента']);?>
                
                <div id="books">
                    
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button', 'id' => 'delete_book']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?php endif; ?>

<?php 
$script = <<< JS
   
$('#bookreturnform-client_id').change(function(){
    $.ajax({
        type: "GET",
        url: "index.php?r=books%2Fbookforclient&book_id="+$(this).val(),
        success: function(data) {
            $("#books").html(data)
        }
    })
});

$('#delete_book').click(function(){
    $.ajax({
        type: "DELETE",
        url: "index.php?r=books%2Fbookdelete&book_id="+$('#bookreturnform-book_id').val(),
        success: function(data) {}
    })
});

JS;
$this->registerJs($script);
?>