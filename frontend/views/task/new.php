<?php $this->title = "New Task" ?>

<div class="row"><h1>Добавление нового задания</h1></div>

<form action="post" method = "post">
  <label>Заголовок</label>
  <input type="text" name = "title"><br>
  <label>Текст</label>
  <input type="text" name = "text"><br>
  <button type = "submit">Отправить</button>
</form>