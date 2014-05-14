function evalJS(obj) {
  obj.find('script').each(function(i) {
    eval( this.textContent );
  });
}

function trackConversionGoogle(id, label) {
  var google_conversion_id = id || 1004366580;
  var google_conversion_label = label || '-fkCCMzGlQUQ9NX13gM';
  var image = new Image(1,1); 
  image.src = '//www.googleadservices.com/pagead/conversion/'+
    google_conversion_id+'/?value=0&label='+google_conversion_label;
}

function trackConversionFacebook(id) {
  var facebook_conversion_id = id || '6011348137687';
  var image = new Image(1,1);
  image.src = '//www.facebook.com/offsite_event.php?id='+
    facebook_conversion_id+'&value=0&currency=USD';
}

function trackConversions() {
  trackConversionGoogle();
  trackConversionFacebook();
}

