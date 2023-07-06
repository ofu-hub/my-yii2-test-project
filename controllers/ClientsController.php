<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Client;
use app\models\ClientForm;

class ClientsController extends Controller 
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

    public function actionClients()
    {
        $clientsArr = Client::find()->all();

        return $this->render('clients', [
            'clientsArr' => $clientsArr,
        ]);
    }

    public function actionAdd()
    {
        $model = new ClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('addClient', [
            'model' => $model,
        ]);
    }
}