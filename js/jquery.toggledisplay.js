;jQuery.fn.toggleDisplay = function (what) {

  $(this).each(function() {
    if ($(this).css('display') == what) {
      $(this).css('display', 'none');
    }
    else {
      $(this).css('display', what);
    }
  });

  return this;
};
