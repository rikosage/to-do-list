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
 * Task controller
 */
class TaskController extends Controller
{

  //Используемый шаблон
  public $layout = "task";
  //Отключение CSRF валидации для данного контролллера (для аякса)
  public $enableCsrfValidation = false;

/**
 * Маршрут для отображения главной страницы
 * @return view
 */
  public function actionIndex()
  {
    $model = new TaskModel;
    $data = $model->getAllTasks();
    return $this->render('index', ["data" => $data]);
  }

/**
 * Добавление нового задания в базу данных
 * @return boolean или view
 */
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
      return $this->render('error', ["errors"=>$model->errors]);
    }
  }

/**
 * Изменение существующего задания
 * @return boolean или json
 */
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

/**
 * Удаление выбранного задания
 * @return json
 */
  public function actionDelete()
  {
    $model = new TaskModel($_POST);
    $result = $model->deleteTask();
    return json_encode($result);
  }
    
}
