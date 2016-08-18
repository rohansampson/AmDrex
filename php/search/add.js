$(document).ready(function(){

  var i = $('input').size() + 1;

  $('#add').click(function() {
    $('<div><input type="text" class="field" name="dynamic[]" value="' + i + '" /></div>').fadeIn('slow').appendTo('.inputs');
    i++;
  });

  $('#remove').click(function() {
    if(i > 1) {
      $('.field:last').remove();
      i--;
    }
  });

  $('#reset').click(function() {
    while(i > 2) {
      $('.field:last').remove();
      i--;
    }
  });

// here's our click function for when the forms submitted

  $('.submit').click(function(){

    var answers = [];
    $.each($('.field'), function() {
      answers.push($(this).val());
    });

    if(answers.length == 0) {
      answers = "none";
    }

  alert(answers);

  return false;

  });

});
