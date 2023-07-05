<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
            <tr>
                <th>Название</th>
                <th>Артикул</th>
                <th>Дата поступления</th>
                <th>Автор</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($booksArr as $book) 
                {
                    echo '<tr>';
                    echo '<td>' . $book->name . '</td>';
                    echo '<td>' . $book->vendor_code . '</td>';
                    echo '<td>' . $book->receipt_date . '</td>';
                    echo '<td>' . $book->author_name . '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
</div>
