<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Book;

/**
 * ContactForm is the model behind the contact form.
 */
class BookForm extends Model
{
    public $name;
    public $vendor_code;
    public $receipt_date;
    public $author_name;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'vendor_code', 'receipt_date', 'author_name'], 'required'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            $book = new Book();
            $book->name = $this->name;
            $book->vendor_code = $this->vendor_code;
            $book->receipt_date = $this->receipt_date;
            $book->author_name =  $this->author_name;
            $book->save();

            return true;
        }
        return false;
    }
}
