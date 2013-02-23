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
  //window.scroll(0, findPos(obj) - 10);
}

function clearCompanyInfo() {
  document.getElementsByName('streetaddr')[0].value = "";
  document.getElementsByName('city')[0].value = "";
  document.getElementsByName('state')[0].value = "CA";
  document.getElementsByName('phone')[0].value = "";
  document.getElementsByName('contact')[0].value = "";
  document.getElementsByName('website')[0].value = "";
  document.getElementsByName('apply')[0].value = "";
  var coursedisp = document.getElementsByName('courses[]');
  for (var i = 0; i < coursedisp.length; i++) {
    coursedisp[i].checked = false;
  }
}

// id is a sanitized version of company name, suitable for element ids
// must pass it in this way because it's sanitized in php
function showCompanyInfo(id) {
  var obj;

  clearCompanyInfo();

  if (!id) {
    obj = document.getElementsByName('company')[0].selectedOptions[0];
    id = obj.id;
  }

  document.getElementsByName('streetaddr')[0].value =
    document.getElementById(id+'_streetaddr').value;
  document.getElementsByName('city')[0].value =
    document.getElementById(id+'_city').value;
  document.getElementsByName('state')[0].value =
    document.getElementById(id+'_state').value;
  document.getElementsByName('phone')[0].value =
    document.getElementById(id+'_phone').value;
  document.getElementsByName('contact')[0].value =
    document.getElementById(id+'_contact').value;
  document.getElementsByName('website')[0].value =
    document.getElementById(id+'_website').value;
  document.getElementsByName('apply')[0].value =
    document.getElementById(id+'_apply').value;

  var courses = document.getElementById(id+'_courses').value;
  courses = courses.split(',');
  var coursedisp = document.getElementsByName('courses[]');
  for (var i = 0; i < coursedisp.length; i++) {
    if (courses.indexOf(coursedisp[i].value) != -1) {
      coursedisp[i].checked = true;
    }
  }
}

function toggleCompany() {
  clearCompanyInfo();
  toggleClass('legendjob', 'hidden');
  toggleClass('legendcompany', 'hidden');
  toggleClass('leftcol', 'hidden');
  toggleClass('leftcolspacer', 'hidden');
  toggleClass('companyname', 'hidden');
  toggleClass('companylist', 'hidden');
  toggleClass('companydata', 'hidden');
}

function displaySourceData(selectobj) {
  sourcename = selectobj.selectedOptions[0].text;
}
