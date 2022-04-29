<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Species;
use app\models\Locations;
use app\models\Measurements;
use app\models\RestClient;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
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
     * Run synchronization.
     *
     * @return string
     */
    public function actionSynchronize() {

//        $species = new Species();
//        $species->name = 'Drosera 123';
//        $species->save();

        RestClient::pullSpecies();
        RestClient::pullLocations();
        RestClient::pullMeasurements();
        return $this->redirect(['site/index']);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index', [
                    'species' => new Species(),
                    'locations' => new Locations(),
                    'measurements' => new Measurements()
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionLocations() {
        return $this->render('locations', [
                    'locations' => Locations::getAllLocations(),
        ]);
    }

    /**
     * Displays Species page.
     *
     * @return string
     */
    public function actionSpecies() {
        return $this->render('species', [
                    'species' => Species::getAllSpecies(),
        ]);
    }

    /**
     * Displays Measures page.
     *
     * @return string
     */
    public function actionMeasures() {
        return $this->render('measures', [
                    'locations' => Locations::getAllLocations(),
        ]);
    }

}
