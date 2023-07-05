<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
    public $username;
    public $password;
    public $role;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['username', 'password', 'role'], 'required'],
        ];
    }

    public function contact()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = $this->password;
            $user->role = 'employee';
            $user->save();

            return true;
        }
        return false;
    }
}
