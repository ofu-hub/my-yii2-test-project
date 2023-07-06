<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use app\models\BookClient;
use app\models\Client;
use kartik\select2\Select2;

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

                <?= $form->field($model, 'client_id')->hiddenInput(['id' => 'clientidbooks'])->textInput(['autofocus' => true])->dropDownList(
                    ArrayHelper::map(Client::getAll(),'id','fio'),['prompt'=>'Выберите клиента']);?>
                
                <div id="books">
                    
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

<?php endif; ?>

<?php 
$script = <<< JS
   
$('#bookaddforclientform-client_id').change(function(){
    $.ajax({
        type: "GET",
        url: "index.php?r=books%2Fbookforclient="+$(this).val(),
        success: function(data) {
            $("#books").html(data)
        }
    })
});
        
JS;
$this->registerJs($script);
?>