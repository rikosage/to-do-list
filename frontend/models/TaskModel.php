<?php 

namespace frontend\models;

use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

class TaskModel extends Model
{
  public function getAllTasks()
  {
    $data = Yii::$app->db->createCommand("SELECT * FROM tasks")->queryAll();
    return $data;
  }

  public function addNewTask($post)
  {
    $data = Yii::$app->db->createCommand()->insert('tasks',[
      'title'   => $post['title'],
      'text'    => $post['text'],
      'active'  => true,
      'date'    => date('Y-m-d H:i:s'),
    ])->execute();
  }
}

?>