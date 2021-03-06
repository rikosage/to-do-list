
/**
 * Функция для удаления задания
 * @param  Object obj Контейнер с конкретным заданием.
 * @return NULL
 */
function deleteTask(obj)
{
  var id = obj.attr('id');
  $.ajax
  ({
    type: "post",
    url: "/task/delete",
    data: {id: id},
    response: "text",
    success: function(data)
    {
      data = JSON.parse(data);
      if (data == 1)
      {
        endOperation("Удалено навеки!", true);
      }
      else
      {
        endOperation(data.text, false);
      }
    }
  });
}


/**
 * Изменение задания. Вызывается сразу из двух обработчиков
 * @param  Object obj Контейнер с конкретным заданием
 * @param  boolean active Активность задания
 * @return NULL
 */
function changeTask(obj, active)
{
 var title = obj.children(".task-info").children('.title-container').children("input").val();
 var text = obj.children(".task-info").children('.text-container').children("textarea").val();
 var id = obj.attr('id');
 $.ajax
  ({
    type: "post",
    url : "/task/change",
    data: {id:id, title: title, text:text, active:active},
    response: "text",
    success: function(data)
    {
      if (data)
      {
        data = JSON.parse(data);
        endOperation(data.text, false);
      }
      else
      {
        endOperation("Данные изменены.", true);
      }
    }
  });
}

/**
 * Вызывается при завершении работы Ajax-запроса.
 * @param  string  warning Текст сообщения
 * @param  Boolean success Успешно ли завершился запрос
 * @return Перезагрузка страницы
 */
function endOperation(warning, success = false)
{
  if (success)
  {
    $(".warning").removeClass("bg-danger").addClass("bg-success");
  }
  else
  {
    $(".warning").removeClass("bg-success").addClass("bg-danger");
  }

  $(".warning").html(warning);
  $(".warning").show("fast");
  setTimeout(function(){
    $(".warning").hide("fast");
    window.location.reload(true);
  }, 1000)

}

$(document).ready(function(){
  $(".task").each(function(){
    if ($(this).hasClass("non-active"))
      {
        $(this).hide();
        $(this).find(".change-button").hide();
      }
  });

  $(".show-hidden").click(function(){
    if ($(this).hasClass("closed"))
    {
      $(this).removeClass("closed").addClass("opened");
      $('.non-active').show();
    }
    else
    {
      $(this).removeClass("opened").addClass("closed");
      $('.non-active').hide();
    }
    
    return false;
  })

  $(".change-button").click(function(){
    var div = $(this).parent().parent();
    var id = div.attr("id");
    div.children(".task-info").children('.title-container').children("h3").hide();
    div.children(".task-info").children('.title-container').children("input").show();
    div.children(".task-info").children('.text-container').children("p").hide();
    div.children(".task-info").children('.text-container').children("textarea").show();
    $(this).parent().children(".change-button").hide();
    $(this).parent().children(".done-button").hide();
    $(this).parent().children(".delete-button").hide();
    $(this).parent().children(".cancel").show();
    $(this).parent().children(".submit-button").show();
  });

  $(".cancel").click(function(){
    window.location.reload(true);
  });

  $(".submit-button").click(function(){
    var obj = $(this).parent().parent();
    var active = (obj.hasClass("active")) ? 1 : 0;
    changeTask(obj, active);
  });

  $(".done-button").click(function(){
    var obj = $(this).parent().parent();
    var active = (obj.hasClass("active")) ? 0 : 1;
    changeTask(obj, active);
  });

  $(".delete-button").click(function(){
    var obj = $(this).parent().parent();
    deleteTask(obj);
  });
});