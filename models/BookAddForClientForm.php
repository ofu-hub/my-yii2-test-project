<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\BookClient;
use app\models\Book;

class BookAddForClientForm extends Model
{
    public $client_id;
    public $book_id;
    public $employee_id;
    public $period;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['client_id', 'book_id', 'employee_id', 'period'], 'required'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            $temp = Book::find()->where(['id' => $this->book_id])->one();
            $temp->isCheck = false;
            $temp->save();
            
            $book = new BookClient();
            $book->client_id = $this->client_id;
            $book->issue_date = Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s');
            $book->book_id = $this->book_id;
            $book->employee_id = $this->employee_id;
            $book->period = $this->period;
            $book->save();

            return true;
        }
        return false;
    }
}