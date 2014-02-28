
/* yes, this is bad, but it's fast.
 * TODO: write real code to pull video list from vzaar via api calls
 */
var vidnumbers = {
  'EMT Bleeding Control' : 1003789,
  'EMT BP Auscultation' : 1003791,
  'EMT BP Palpation' : 1003792,
  'EMT BS Auscultation' : 1003793,
  'EMT BS Palpation' : 1003794,
  'EMT Childbirth' : 1003797,
  'EMT Combitube' : 1003799,
  'EMT Hare Traction Splint' : 1003800,
  'EMT King LT-D' : 1003801,
  'EMT KTD Traction Splint' : 1003787,
  'EMT Mouth-to-bag-valve Ventilation' : 1004499,
  'EMT NPA' : 1004500,
  'EMT O2 Assembly' : 1004501,
  'EMT O2 Nasal Cannula' : 1004502,
  'EMT O2 Non-rebreather Mask' : 1004503,
  'EMT OPA' : 1004504,
  'EMT Sager Traction Splint' : 1004507,
  'EMT Skin Assessment' : 1003688,
  'EMT Suctioning' : 1004509,
  'EMT CPAP' : 1462048,
  'EMT C-Collar' : 1462047,
  'EMT Primary Assessment' : 1462000,
  'Sample Interview' : 1203780,
  'EMT Testimonial - Chris Pobre' : 1399035
};

// this function will remove the padding-bottom css on the container it fills
// if the container starts with 0 height
function insertVideo(container, vidname, replace, width, height) {
  container = findObj(container);
  if (!container) return;

  var hascontent = false;
  if (container.getAttribute('data-videocontent')) hascontent = true;

  if (!replace && hascontent) return;

  var num = vidnumbers[vidname];
  var str = '';

  // default values
  if (typeof(width) === 'undefined') width = "448";
  if (typeof(height) === 'undefined') height = "306";

  if (width == "max") width = container.clientWidth;
  if (height == "max") {
    height = container.clientHeight;
    if (height == "0") {
      // default height/width ratio
      container.style.paddingBottom = "60%";
      height = container.clientHeight;
      container.style.paddingBottom = "0";
    }
  }

  if (!num) {
    header = 'There was a problem finding your video.';
    header += '<br />';
    header += 'Please try again later.';
  }
  else {
    container.setAttribute('data-videocontent', 1);
    header = vidname;
    /* JS doesn't have a <<<heredoc syntax, sorry... */
    str = '\
<div class="video-content">\
  <object data="http://view.vzaar.com/' + num + '/flashplayer" class="video-object" type="application/x-shockwave-flash" \
    height=' + height + ' width=' + width + '>\
    <param name="allowFullScreen" value="true" />\
    <param name="allowScriptAccess" value="always" />\
    <param name="wmode" value="transparent" />\
    <param name="movie" value="http://view.vzaar.com/' + num + '/flashplayer" />\
    <param name="flashvars" value="border=none&amp;colourSet=blue&amp;showplaybutton=true" />\
    <video controls class="video-element" onclick="this.play();" poster="http://view.vzaar.com/' + num + '/image" \
      preload="none" src="http://view.vzaar.com/' + num + '/video" \
      height=' + height + ' width=' + width + '></video>\
  </object>\
</div>\
';
  }

  container.innerHTML =
    '<div class="video-title">' + header + '</div>' + "\n" + str;
}

function choosevid(obj, vidname) {
  insertVideo('videobox', vidname, true);
  /*
  var str = '\
<div class="vzaar_media_player">\
  <object data="http://view.vzaar.com/VIDNUM/flashplayer" id="video" type="application/x-shockwave-flash" height="306" width="448">\
    <param name="allowFullScreen" value="true" />\
    <param name="allowScriptAccess" value="always" />\
    <param name="wmode" value="transparent" />\
    <param name="movie" value="http://view.vzaar.com/VIDNUM/flashplayer" />\
    <param name="flashvars" value="border=none&amp;colourSet=blue&amp;showplaybutton=true" />\
    <video controls height="306" id="vzvid" onclick="this.play();" poster="http://view.vzaar.com/VIDNUM/image" preload="none" src="http://view.vzaar.com/VIDNUM/video" width="448"></video>\
  </object>\
</div>\
';

  var num = vidnumbers[vidname];

  if (!num) {
    header = 'There was a problem finding your video.';
    header += '<br />';
    header += 'Please try again later.';
    str = '';
  }
  else {
    var re = new RegExp("VIDNUM", "g");
    str = str.replace(re, num);
    toggleClass(obj, 'video-selected');
    header = vidname;
  }

  document.getElementById("videobox").innerHTML =
    '<h3 id="vidtitle" class="video-title">' + header + '</h3>' + "\n" + str;
  */
}

