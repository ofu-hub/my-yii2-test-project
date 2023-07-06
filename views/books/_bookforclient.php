<?php

use yii\helpers\ArrayHelper;
use app\models\BookClient;

?>
<div>
    <?= $form->field($model, 'id')->dropDownList(
        ArrayHelper::map(BookClient::find()->all(),'id','id'),['prompt'=>'Выберите книгу']);?>
</div>