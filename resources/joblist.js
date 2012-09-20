/* extra functions for working with html/css classes
 * why doesn't js have built-in functions to do this,
 * this is stupid
 */

function hasClass(obj, name) {
  return (' ' + obj.className + ' ').indexOf(' ' + name + ' ') > -1;
}

function addClass(obj, name) {
  obj.className += (obj.className ? ' ' : '') + name;
}

/* split the space-separated string into an array,
 * then make a new array with every element that's
 * not the name we're removing
 */
function removeClass(obj, name) {
  if (!obj.className) return;
  var temparr = obj.className.split(' ');
  var newarr = new Array;
  for (var i = 0; i < temparr.length; i++) {
    if (temparr[i] != name)
      newarr.push(temparr[i]);
  }
  obj.className = newarr.join(' ');
}  

function toggleShow(obj) {
  var chs = obj.children;
  for (var i = 0; i < chs.length; i++) {
    el = chs[i];
    if (el.tagName.toLowerCase() == "div" && hasClass(el, "bottom")) {
      /*
      if (el.style.overflow == "hidden") {
	el.style.overflow = "visible";
	el.style.maxHeight = "none";
      }
      else {
	el.style.overflow = "hidden";
	el.style.maxHeight = "5em";
      }
      */
      if (!hasClass(el, "showfull")) {
	addClass(el, "showfull");
      }
      else {
	removeClass(el, "showfull");
      }
    }
  }
}
