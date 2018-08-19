<?php
/**
 * Created by PhpStorm.
 * User: wangxl
 * Date: 18/7/29
 * Time: 下午4:48
 */
namespace app\controllers;
use Yii;
use yii\web\Controller;
class PersonToCarController extends Controller{
    public $layout = 'mobile_main';
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}