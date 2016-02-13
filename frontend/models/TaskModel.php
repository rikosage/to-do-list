<?php 

namespace frontend\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

class TaskModel extends Model
{

  public $title;
  public $text;

  public function rules()
  {
    return [
      [ ['title'],'string', 'length' => [5, 10]], 
      [ ['text'], 'string', 'min' => 10],
    ];
  }

  public function __contruct($data = [])
  {
    $this->title = $data['title'];
    $this->text  = $data['text'];
  }

  public function getAllTasks()
  {
    $data = Yii::$app->db->createCommand("SELECT * FROM tasks")->queryAll();
    return $data;
  }

  public function addNewTask()
  {
    /*$this->title = $post['title'];
    $this->text  = $post['text'];
    $data = Yii::$app->db->createCommand()->insert('tasks',[
      'title'   => $post['title'],
      'text'    => $post['text'],
      'active'  => true,
      'date'    => date('Y-m-d H:i:s'),
    ])->execute();*/
    echo $this->title;
  }
}

?>