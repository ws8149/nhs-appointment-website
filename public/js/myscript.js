$(document).ready(function()
{
  $("#button-popup").click(function()
  {
      $(".window-popup").fadeIn(300);
  });

  $("#button-popup-close").click(function()
  {
      $(".window-popup").fadeOut(300);
  });
});

// $('#myModal').on('shown.bs.modal', function () {
// $('#myInput').trigger('focus')
// })
