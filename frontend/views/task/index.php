<?php $this->title = "All Tasks" ?>

<div class="row">
  <div class="col-lg-6 col-lg-offset-3 add-container"></div>
</div>
<div class="row">
  <div class="col-lg-6 col-lg-offset-3 tasks-container">
    <?php for ($i=count($data)-1; $i >= 0; $i--) { ?>
    <?php $active = ($data[$i]['active'] == true) ? "active" : "non-active" ?>
    <div id = "<?php echo $data[$i]['id']; ?>" class="col-lg-12 task <?php echo $active; ?>">
      <div class="task-info col-lg-9">
        <div class="date-container text-left"><p><?php echo $data[$i]['date']; ?></p></div>
        <div class="title-container text-center">
          <h3><?php echo $data[$i]['title']; ?></h3>
          <input class = "change-task-title text-center" type="text" value = "<?php echo $data[$i]['title']; ?>">
        </div>
        <div class="text-container">
          <p><?php echo $data[$i]['text']; ?></p>
          <textarea class = "form-control change-task-text" type="text"><?php echo $data[$i]['text']; ?></textarea>
        </div>
      </div>
      <div class="update-container col-lg-3">
        <div><button class="btn btn-primary form-control">Изменить</button></div>
        <div><button class="btn btn-success form-control">Выполнено</button></div>
        <div><button class="btn btn-danger form-control">Удалить</button></div>
      </div>
    </div>
    <?php }; ?>
  </div>
</div>


