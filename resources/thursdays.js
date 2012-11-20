
// this code does not work. I have not tried to debug it yet.

function next3Thursdays() {
  var today = new Date();
  var thursdays = new Array();
  var max = 3;

  // may need to do up two additional months
  for (var month_incr = 0; month_incr < 3; month_incr++) {
    var day_incr;
    var mo = new Date(); // should initially be the same as today

    // start at the first day of the month
    mo.setMonth(today.getMonth + month_incr);
    mo.setDate(1);

    // figure out the first thursday (getDay() returns 0-6 for day of week)
    day_incr = mo.getDay();
    if (day_incr < 4) // day 1 of the month is before thursday
      day_incr = 4 - day_incr;
    if (day_incr > 4) // day 1 of the month is after thursday
      day_incr = 7 - (day_incr - 4);
    if (day_incr == 4) // day 1 of the month is a thursday
      day_incr = 0;

    mo.setDate(mo.getDate() + day_incr);
    // only count it if it's after today
    if (mo >= today) {
      thursdays.push(formatDateString(mo));
      if (thursdays.length >= max)
	break;
    }

    // the third thursday will always be 14 days after the first one
    mo.setDate(mo.getDate() + 14);
    if (mo >= today) {
      thursdays.push(formatDateString(mo));
      if (thursdays.length >= max)
	break;
    }

  }

  return thursdays;
}

function formatDateString(mo) {
  var monthnames = [
    "January", "February", "March", "April",
    "May", "June", "July", "August",
    "September", "October", "November", "December"
  ];
  var str;

  str = monthnames[ mo.getMonth() ] + " ";
  str = str + mo.getDate() + ", " + mo.getFullYear();

  return str;
}

function insertDates(elementid) {
  var obj = document.getElementById(elementid);
  var dates = next3Thursdays();
  for (var i = 0; i < dates.length; i++) {
    var newdiv = document.createElement("div");
    newdiv.innerHTML = dates[i];
    while (newdiv.firstChild) {
      obj.appendChild(newdiv.firstChild);
    }
  }
}

