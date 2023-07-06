<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Список сотрудников';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
            <tr>
                <th>ФИО</th>
                <th>Номер паспорта</th>
                <th>Серия паспорта</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($clientsArr as $client) 
                {
                    echo '<tr>';
                    echo '<td>' . $client->fio . '</td>';
                    echo '<td>' . $client->passport_id . '</td>';
                    echo '<td>' . $client->series . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
