function showWarning(warning)
{
  alert(warning);
}

$(document).ready(function(){
  $('.add-new-task').click(function(){
    addNewTask();
  });
});