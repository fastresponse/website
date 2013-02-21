/*

function hasClass(obj, name) {
  return (' ' + obj.className + ' ').indexOf(' ' + name + ' ') > -1;
}

function addClass(obj, name) {
  obj.className += (obj.className ? ' ' : '') + name;
}

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
*/

function toggleShow(obj) {
  var chs = obj.children;
  for (var i = 0; i < chs.length; i++) {
    el = chs[i];
    if (hasClass(el, "bottom")) {
      toggleClass(el, "hidden");
    }
  }
  window.scroll(0, findPos(obj) - 10);
}

function toggleCompany() {
  toggleClass('legendjob', 'hidden');
  toggleClass('legendcompany', 'hidden');
  toggleClass('leftcol', 'hidden');
  toggleClass('leftcolspacer', 'hidden');
  toggleClass('companyname', 'hidden');
  toggleClass('companylist', 'hidden');
  toggleClass('companydata', 'hidden');
}

function addSource(name, srclistname) {
  var flag = 0;
  var obj;
  var list;

  if (!name || !srclistname)
    return;

  obj = document.getElementById(name);
  list = document.getElementById(srclistname);

  // make sure the source isn't already in the list
  for (var i = 0; i < list.length; i++) {
    if (list.options[i].text.toLowerCase() == obj.value.toLowerCase()) {
      flag = 1;
      break;
    }
  }

  if (!flag) {
    var option = document.createElement("option");
    option.text = obj.value;
    // stupid IE hack (for pre-8.0)
    try {
      list.add(option, list.options[null]);
    }
    catch (e) {
      list.add(option, null);
    }
  }

  // remove the text that was entered in the text input box
  obj.value = obj.defaultValue;
}

function displaySourceData(selectobj) {
  sourcename = selectobj.selectedOptions[0].text;
}
