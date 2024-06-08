$(document).ready(function () {
  $('#searchButton').hide();
  // buat event ketika keyword ditulis
  $('#keyword').on('keyup', function () {
    // munculkan loading
    $('.load').show();
    // $.get()
    $.get('../ajax/kursus.php?keyword=' + $('#keyword').val(), function (data) {
      $('#container').html(data);
      $('.load').hide();
    });
  });
});
