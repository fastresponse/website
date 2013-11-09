;$.fn.rotate = function(period) {
  return this.each(function() {
    var $children = $(this).children();
    var position = -1;
    !function loop() {
      position = (position + 1) % $children.length;
      $children.eq(position)
               .fadeIn(1000)
               .delay(period)
               .fadeOut(1000, loop);
    }();
  });
};
