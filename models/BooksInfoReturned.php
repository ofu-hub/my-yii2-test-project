<?php

namespace app\models;

use yii\db\ActiveRecord;

class BooksInfoReturned extends ActiveRecord
{
    public static function tableName() 
    {
        return 'books_info_returned';
    }
}