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
                <th>Номер в системе</th>
                <th>Имя пользователя</th>
                <th>Пароль</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($employeesArr as $employee) 
                {
                    echo '<tr>';
                    echo '<td>' . $employee->id . '</td>';
                    echo '<td>' . $employee->username . '</td>';
                    echo '<td>' . $employee->password . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
