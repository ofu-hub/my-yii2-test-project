<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\UserForm;

class EmployeesController extends Controller 
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    // Return page list employees
    public function actionEmployees()
    {
        $employeesArr = User::find()->where(['role' => 'employee'])->all();

        return $this->render('employees', [
            'employeesArr' => $employeesArr,
        ]);
    }

    // Return page add employee
    public function actionAdd()
    {
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('addEmployee', [
            'model' => $model,
        ]);
    }
}