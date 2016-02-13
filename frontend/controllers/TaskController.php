<?php
namespace frontend\controllers;

use Yii;
use frontend\models\TaskModel;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class TaskController extends Controller
{

  public $layout = "task";
  public $enableCsrfValidation = false;

  public function actionIndex()
  {
    $model = new TaskModel;
    $data = $model->getAllTasks();
    return $this->render('index', ["data" => $data]);
  }

  public function actionNew()
  {
    return $this->render('new');
  }

  public function actionPost()
  {
    $model = new TaskModel;
    $model->addNewTask($_POST);
    return Yii::$app->response->redirect(['/']);
  }

  public function actionChange()
  {
    return $this->render('change', $_POST);
  }
    
}
