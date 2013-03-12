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

// there is no easy, reliable way to test if a variable is an array
// (really javascript? how do you get away with sucking so much?)
// so just make a new function
function toggleClassArr(args, classname) {
  for (var i = 0; i < args.length; i++) {
    toggleClass(args[i], classname);
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

var sectiondir = '';
function setSectionLocation(dir) {
  sectiondir = dir;
}

var sectionparents = {};
function setSectionParents(parentarr) {
  sectionparents = parentarr;
}

function deactivateChildren(obj) {
  obj = findObj(obj);
  var chs = obj.children;
  for (var i = 0; i < chs.length; i++) {
    chs[i].style.color = '#FFFFFF';
  }
}

function activateMe(obj) {
  obj = findObj(obj);
  obj.style.color = '#DD0033';
}



/* these functions let us turn a class OFF on only one of
 * an arbitrary group of elements while turning it ON on
 * the others, or vice-versa
 */
var sectionarr = {};
function setSection(theparent, subsects) {
  sectionarr[theparent] = subsects;
}

function classOnSubSection(theparent, id, classname) {
  subs = sectionarr[theparent];
  for (var i = 0; i < subs.length; i++) {
    if (subs[i] == id) {
      addClass(subs[i], classname);
    }
    else {
      removeClass(subs[i], classname);
    }
  }
}
function classOffSubSection(theparent, id, classname) {
  subs = sectionarr[theparent];
  for (var i = 0; i < subs.length; i++) {
    if (subs[i] == id) {
      removeClass(subs[i], classname);
    }
    else {
      addClass(subs[i], classname);
    }
  }
}

/* example: unhide one element, hide all the rest */
function showSubSection(theparent, id) {
  classOffSubSection(theparent, id, 'hidden');
}



function activateOne(obj) {
  for (var j = 0; j < sectionparents.length; j++) {
    deactivateChildren(sectionparents[j]);
  }
  activateMe(obj);
}

function showSection(obj, file) {
  var display = document.getElementById("section-display");
  display.src = sectiondir + file + '.html';
  for (var j = 0; j < sectionparents.length; j++) {
    deactivateChildren(sectionparents[j]);
  }
  activateMe(obj);
}

function showSectionDiv(obj, file) {
  var display = document.getElementById("section-display");
  display.innerHTML =
    '<iframe src="' + sectiondir + file + '.html" ' +
    'frameborder="0" scrolling="no" allowtransparency="true" ' +
    'seamless="seamless" ' +
    'style="display: inline-block; width: 100%;" ' +
    'onLoad="resizeIframe(this);" ' +
    '>' +
    '<p>Your browser does not support the use of IFrames, ' +
    'which are required to view this content.</p>' +
    '<p>Please try again using a modern desktop web browser.</p>' +
    '</iframe>'
  ;
  for (var j = 0; j < sectionparents.length; j++) {
    deactivateChildren(sectionparents[j]);
  }
  activateMe(obj);
}

function resizeIframe(obj) {
  obj.height = obj.contentWindow.document.body.scrollHeight + "px";
}

function setSource(obj, loc, replace) {
  obj = findObj(obj);
  if (!obj) return;
  if (!replace && (obj.src || obj.src != "")) return;
  obj.src = loc;
}

function googleViewer(loc) {
  var url = "http://docs.google.com/viewer?embedded=true&url=";
  url = url + encodeURIComponent(loc);
  return url;
}
