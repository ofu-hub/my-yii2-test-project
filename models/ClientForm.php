<?php

namespace app\models;

use yii\base\Model;
use app\models\Client;

/**
 * ContactForm is the model behind the contact form.
 */
class ClientForm extends Model
{
    public $fio;
    public $passport_id;
    public $series;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'passport_id', 'series'], 'required'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            $client = new Client();
            $client->fio = $this->fio;
            $client->passport_id = $this->passport_id;
            $client->series = $this->series;
            $client->save();

            return true;
        }
        return false;
    }
}
