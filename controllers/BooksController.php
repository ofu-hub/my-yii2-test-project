<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Book;
use app\models\BookForm;
use app\models\BookAddForClientForm;
use app\models\BookClient;
use app\models\User;

class BooksController extends Controller 
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

    // Return page list books
    public function actionBooks()
    {
        $booksArr = Book::find()->all();

        return $this->render('books', [
            'booksArr' => $booksArr,
        ]);
    }

    // Return page add book
    public function actionAdd()
    {
        $model = new BookForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('addBook', [
            'model' => $model,
        ]);
    }

    // Return page add book to client
    public function actionClientbook()
    {
        $model = new BookAddForClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('getBookToClient', [
            'model' => $model,
        ]);
    }

    // Return page return book
    public function actionReturnbook()
    {
        $model = new BookAddForClientForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact()) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('returnBook', [
            'model' => $model,
        ]);
    }

    public function actionBookforclient($client_id) 
    {
        $model = BookClient::getBookForClientId($client_id);
        
        return $this->renderPartial('_bookforclient', [
            'model' => $model,
        ]);
    }
}