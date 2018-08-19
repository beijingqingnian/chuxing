<?php
/**
 * Created by PhpStorm.
 * User: wangxl
 * Date: 18/8/18
 * Time: 下午4:30
 */
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Travel;
//use app\models\Province;
use app\models\City;
use yii\filters\AccessControl;

class CarOwnerController extends Controller{
    public $layout = 'mobile_main';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'captcha'],
                        'allow' => true,
                    ],
                ],
            ]
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
                'maxLength' => 4,
                'minLength' => 4
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex(){
        $model = new Travel();
        //$province = Province::getProviceList();
        $cityList = City::getCityList();
        //var_dump($cityList);
        if (Yii::$app->request->isPost && Yii::$app->request->post()) {
            var_dump(Yii::$app->request->post());
            exit();
            //Yii::$app->session->setFlash('contactFormSubmitted');
            //return $this->refresh();
        }

        return $this->render('index',['model' => $model,'cityList' => $cityList]);
    }
}