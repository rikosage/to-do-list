<?php 

namespace frontend\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

class TaskModel extends Model
{

  //Идентификатор задания
  public $id;

  //Заголовок задачи
  public $title;

  //Текст задачи
  public $text;

  //Активность задачи
  public $active = true;

/**
 * Правила валидации для данной модели
 * @return array
 */
  public function rules()
  {
    return [
      [ ['title'],'string', 'length' => [5, 30]], 
      [ ['text'], 'string', 'min' => 10],
    ];
  }

/**
 * Определяются переменные задачи
 * @param  array  $data
 * @return NULL
 */
  public function __contruct($data = [])
  {
    $this->id     = (isset($data['id'])) ? $data['id'] : NULL;
    $this->title  = (isset($data['title'])) ? $data['title'] : NULL;
    $this->text   = (isset($data['text'])) ? $data['text'] : NULL;
    $this->active = (isset($data['active'])) ? $data['active'] : true;
  }

/**
 * Выборка всех существующих задач из БД.
 * @return Object
 */
  public function getAllTasks()
  {
    $data = Yii::$app->db->createCommand("SELECT * FROM tasks")->queryAll();
    return $data;
  }

/**
 * Добавление нового задания
 * @return boolean или array
 */
  public function addNewTask()
  {
    $data = Yii::$app->db->createCommand()->insert('tasks',[
      'title'   => $this->title,
      'text'    => $this->text,
      'active'  => $this->active,
      'date'    => date('Y-m-d H:i:s'),
    ])->execute();
    return $data;
  }

/**
 * Изменение данных задания
 * @return boolean или array
 */
  public function changeTask()
  {
    $data = Yii::$app->db->createCommand()->update('tasks', [
      'title'   => $this->title,
      'text'    => $this->text,
      'active'  => $this->active,
      'date'    => date('Y-m-d H:i:s'),
    ],  "id = $this->id")->execute();
    return $data;
  }

  /**
   * Удаление задания
   * @return boolean или array
   */
  public function deleteTask()
  {
    $data = Yii::$app->db->createCommand()->delete('tasks',"id = $this->id")->execute();
    return $data;
  }
}

?>