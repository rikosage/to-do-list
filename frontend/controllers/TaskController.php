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
    $model = new TaskModel($_POST);
    if ($model->validate())
    {
      $model->addNewTask();
      return Yii::$app->response->redirect(['/']);
    }
    else
    {
      return json_encode($model->errors);
    }
  }

  public function actionChange()
  {
    $model = new TaskModel($_POST);
    if ($model->validate())
    {
     $model->changeTask();
    }
    else
    {
     return json_encode($model->errors);
    }
  }

  public function actionDelete()
  {
    $model = new TaskModel($_POST);
    $result = $model->deleteTask();
    echo json_encode($result);
  }
    
}
