;jQuery.fn.sameHeight = function() {
  var maxheights = {};

  this.each(function() {
    var mytop = $(this).offset().top;
    var myheight = $(this).height();
    if ( !maxheights[mytop] || myheight > maxheights[mytop]) {
      maxheights[mytop] = myheight;
    }
  });

  this.each(function() {
    $(this).height( maxheights[ $(this).offset().top ] );
  });

  return this;
};
