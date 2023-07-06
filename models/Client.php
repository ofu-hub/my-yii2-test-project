<?php

namespace app\models;

use yii\db\ActiveRecord;

class Client extends ActiveRecord
{
    public static function tableName() 
    {
        return 'clients';
    }

    public static function getAll() {
        return self::find()->all();
    }
}