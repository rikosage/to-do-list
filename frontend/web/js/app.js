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
});