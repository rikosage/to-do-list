function changeTask(obj)
{
 var title = obj.children(".task-info").children('.title-container').children("input").val();
 var text = obj.children(".task-info").children('.text-container').children("textarea").val();
 var id = obj.attr('id');
 var active = (obj.hasClass("active")) ? 1 : 0;
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
        alert(data.text);
      }
      else
      {
        window.location.reload(true);
      }
    }
  });
}


function showWarning(warning)
{
  alert(warning);
}

$(document).ready(function(){
  $(".task").each(function(){
    if ($(this).hasClass("non-active"))
      {
        $(this).hide();
      }
  });

  $(".show-hidden").click(function(){
    $('.non-active').show();
    return false;
  })

  $('.change-button').click(function(){
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
    changeTask(obj);
  });
});