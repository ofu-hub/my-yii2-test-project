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

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['client_id', 'book_id', ], 'required'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            $temp = Book::find()->where(['id' => $this->book_id])->one();
            $temp->isCheck = true;
            $temp->save();
            
            BookClient::find()->where(['id' => $this->client_id])->one()->delete();

            return true;
        }
        return false;
    }
}