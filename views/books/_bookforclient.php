<?php

use yii\bootstrap5\ActiveForm;

?>
<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <select class="form-select" id="bookreturnform-book_id" name="BookReturnForm[book_id]">
            <?php
                foreach($model as $book) 
                {
                    ?>
                        <option value="<?= $book->id ?>"><?= $book->name ?></option>
                    <?php
                }
            ?>
        </select>
<?php ActiveForm::end(); ?>