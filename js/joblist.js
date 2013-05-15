
function toggleShow(obj) {
  var chs = obj.children;
  for (var i = 0; i < chs.length; i++) {
    el = chs[i];
    if (
      hasClass(el, "bottom") ||
      hasClass(el, "website") ||
      hasClass(el, "companyname")
    ) {
      toggleClass(el, "hidden");
    }
  }
  //window.scroll(0, findPos(obj) - 10);
}

function clearCompanyInfo() {
  obj = document.getElementsByName('allcompanynames')[0].selectedOptions[0];
  comp = document.getElementsByName('company')[0];
  if (comp.value == obj.value)
    comp.value = "";
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
    obj = document.getElementsByName('allcompanynames')[0].selectedOptions[0];
    id = obj.id;
  }

  document.getElementsByName('company')[0].value =
    obj.value;
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
  toggleClass('companylist', 'hidden');
  toggleClass('companydata', 'hidden');
}

function displaySourceData(selectobj) {
  sourcename = selectobj.selectedOptions[0].text;
}
