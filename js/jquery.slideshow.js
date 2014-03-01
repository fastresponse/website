;jQuery.fn.slideshow = function(slidepausetime, slidefadetime) {
  return this.each(function() {
    var $children = jQuery(this).children();
    if ($children.length > 1) {
      $children.hide();
      var position = -1;
      // using !function loop() {}() is equivalent to ;(function loop() {})();
      // it declares the function then immediately calls it, forcing semicolons
      !function loop() {
        position = (position + 1) % $children.length;
        $children.eq(position)
          .fadeIn(slidefadetime)
          .delay(slidepausetime)
          .fadeOut(slidefadetime, loop);
      }();
    }
  });
};
