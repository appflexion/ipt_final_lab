<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use \common\models\Test;
use \yii\helpers\Json;

class TodoController extends Controller{

    public function actionIndex(){
        $data = Test::find()->all();
        return Json::encode($data);
    }

    public function actionStore(){
      $model = new Test;
        if(Yii::$app->request->ajax()){
            $model->name = Yii::$app->request->post('name');
            $model->date = Yii::$app->request->post('date');
            $model->save();
            return Json::encode($model);
      }
    }

    
}


