<?php $this->title = "All Tasks" ?>

<div class="row">
  <div class="col-lg-6 col-lg-offset-3 add-container">
    <form action="/task/post" method = "post">
      <div class="text-center"><h2>Добавить новое дело</h2></div>
      <label>Введите название</label>
      <input type="text" required = "required"  name = "title" class = "new-title form-control">
      <label>Введите текст напоминания</label>
      <textarea name = "text" required = "required"  class = "new-text form-control" rows="5"></textarea>
      <button type = "submit" class="btn btn-success add-new-task">Добавить</button>
      <button class="btn btn-primary show-hidden">Показать выполненые задачи</button>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3 tasks-container">
    <?php for ($i=count($data)-1; $i >= 0; $i--) { ?>
    <?php $active = ($data[$i]['active'] == true) ? "active" : "non-active" ?>
    <?php $lock = ($data[$i]['active'] == true) ? "Выполнено" : "Активировать" ?>
    <div id = "<?php echo $data[$i]['id']; ?>" class="col-lg-12 task <?php echo $active; ?>">
      <div class="task-info col-lg-9">
        <div class="date-container text-left"><p><?php echo $data[$i]['date']; ?></p></div>
        <div class="title-container text-center">
          <h3><?php echo $data[$i]['title']; ?></h3>
          <input class = "change-task-title form-control text-center" required = "required" type="text" value = "<?php echo $data[$i]['title']; ?>">
        </div>
        <div class="text-container">
          <p><?php echo $data[$i]['text']; ?></p>
          <textarea class = "form-control change-task-text" required = "required" type="text"><?php echo $data[$i]['text']; ?></textarea>
        </div>
      </div>
      <div class="update-container col-lg-3">
        <button class="btn btn-primary form-control change-button">Изменить</button>
        <button class="btn btn-success form-control done-button"><?php echo $lock; ?></button>
        <button class="btn btn-danger form-control delete-button">Удалить</button>
        <button class="btn btn-success form-control submit-button">Применить</button>
        <button class="btn btn-danger form-control cancel">Отменить</button>
      </div>
    </div>
    <?php }; ?>
  </div>
</div>


