;jQuery.fn.sameHeight = function() {
  var maxheights = {};

  this.each(function() {
    var t = $(this).offset().top;
    var h = $(this).height();
    if ( !maxheights[ t ] || h > maxheights[ t ]) {
      maxheights[ t ] = h;
    }
  });

  this.each(function() {
    var t = $(this).offset().top;
    var h = maxheights[ t ];
    if (h > $(this).height()) {
      $(this).height(h);
    }
  });

  return this;
};
