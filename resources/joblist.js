function toggleShow(obj) {
  var chs = obj.children;
  for (var i = 0; i < chs.length; i++) {
    el = chs[i];
    if (el.tagName.toLowerCase() == "div" && el.className == "bottom") {
      if (el.style.overflow == "hidden") {
	el.style.overflow = "visible";
      }
      else {
	el.style.overflow = "hidden";
      }
    }
  }
}
