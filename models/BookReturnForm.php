<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\BookClient;
use app\models\Book;

class BookReturnForm extends Model
{
    public $client_id;
    public $book_id;
    public $isCheck;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['client_id', 'book_id', 'isCheck'], 'required'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            $temp = Book::find()->where(['id' => $this->book_id])->one();
            $temp->isCheck = TRUE;
            $temp->save();

            $bookclient = BookClient::find()->where(['id' => $this->client_id])->one();

            $deletedBook = new BooksInfoReturned();
            $deletedBook->returned_date = Yii::$app->formatter->asDate('now', 'php:Y-m-d H:i:s');
            $deletedBook->client_id = $bookclient->client_id;
            $deletedBook->book_id = $bookclient->book_id;
            $deletedBook->save();

            $bookclient->delete();

            return true;
        }
        return false;
    }
}