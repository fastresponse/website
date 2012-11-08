/* extra functions for working with html/css classes
 * why doesn't js have built-in functions to do this,
 * this is stupid
 */

function hasClass(obj, name) {
  obj = findObj(obj);
  if (!obj) return 0;
  return (' ' + obj.className + ' ').indexOf(' ' + name + ' ') > -1;
}

function addClass(obj, name) {
  obj = findObj(obj);
  if (!obj) return;
  if (hasClass(obj, name)) return;
  obj.className += (obj.className ? ' ' : '') + name;
}

/* split the space-separated string into an array,
 * then make a new array with every element that's
 * not the name we're removing
 */
function removeClass(obj, name) {
  obj = findObj(obj);
  if (!obj) return;
  if (!obj.className) return;
  if (!hasClass(obj, name)) return;
  var temparr = obj.className.split(' ');
  var newarr = new Array;
  for (var i = 0; i < temparr.length; i++) {
    if (temparr[i] != name)
      newarr.push(temparr[i]);
  }
  obj.className = newarr.join(' ');
}  

function findObj(arg) {
  var obj;

  if (typeof(arg) == "string")
    obj = document.getElementById(arg);
  else
    obj = arg;

  return obj;
}

function toggleClass(arg, classname) {
  var obj = findObj(arg);
  if (!obj)
    return;

  if (hasClass(obj, classname)) {
    removeClass(obj, classname);
  }
  else {
    addClass(obj, classname);
  }
}

function findPos(obj) {
  var curtop = 0;
  if (obj.offsetParent) {
    do {
      curtop += obj.offsetTop;
    } while (obj = obj.offsetParent);
  }
  return curtop;
}

function checkRadio(obj) {
  obj = findObj(obj);
  if (!obj) return;
  obj.checked = true;
}

