<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
// use yii\web\Request;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Ours;
use app\models\Competitors;
use app\models\Addconcert;
use app\models\Concerts;
use app\models\Analytics;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'save' => ['post']
                ],
            ],
        ];
    }

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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
           return $this->redirect('login');
        }
        return $this->render('concerts');
    }

    /**
     * Displays competitors page.
     *
     * @return string
     */
    public function actionCompetitors()
    {
        return $this->render('competitors');
    }

    /**
     * Displays ours page.
     *
     * @return string
     */
    public function actionOurs()
    {
        return $this->render('ours');
    }

    /**
     * Displays addconcert page.
     *
     * @return string
     */
    public function actionAddconcert()
    {
        $model = new Addconcert();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
           if($model->save()) {
            Yii::$app->session->setFlash('success', "Концерт добавлен");
           } else {
            Yii::$app->session->setFlash('error', "Концерт не добавлен. Что-то пошло не так.");
           }
        }
        return $this->render('addconcert', compact('model'));
    }

    /**
     * Displays analytics page.
     *
     * @return string
     */
    public function actionAnalytics()
    {
        
        return $this->render('analytics');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->user->loginUrl);

    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
        // change layout for error action
            if ($action->id=='login')
            $this->layout = 'login';
            return true;
        } else {
            return false;
        }
    }


}
