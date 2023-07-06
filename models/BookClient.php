<?php

namespace app\models;

use yii\db\ActiveRecord;

class BookClient extends ActiveRecord
{
    public static function tableName() 
    {
        return 'books_client';
    }

    public static function getBookForClientId($client_id) {
        return self::find()->where(['client_id' => $client_id])->all();
    }
}