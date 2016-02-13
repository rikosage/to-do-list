<?php 

namespace frontend\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

class TaskModel extends Model
{

  public $id;
  public $title;
  public $text;
  public $active = true;

  public function rules()
  {
    return [
      [ ['title'],'string', 'length' => [5, 30]], 
      [ ['text'], 'string', 'min' => 10],
    ];
  }

  public function __contruct($data = [])
  {
    $this->id     = (isset($data['id'])) ? $data['id'] : NULL;
    $this->title  = (isset($data['title'])) ? $data['title'] : NULL;
    $this->text   = (isset($data['text'])) ? $data['text'] : NULL;
    $this->active = (isset($data['active'])) ? $data['active'] : true;
  }

  public function getAllTasks()
  {
    $data = Yii::$app->db->createCommand("SELECT * FROM tasks")->queryAll();
    return $data;
  }

  public function addNewTask()
  {
    Yii::$app->db->createCommand()->insert('tasks',[
      'title'   => $this->title,
      'text'    => $this->text,
      'active'  => $this->active,
      'date'    => date('Y-m-d H:i:s'),
    ])->execute();
    return $data;
  }

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

  public function deleteTask()
  {
    $data = Yii::$app->db->createCommand()->delete('tasks',"id = $this->id")->execute();
    return $data;
  }
}

?>