<div id="send_to_a_friend" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Send to a Friend</h1>
    </div>
  </div>
  <div class="body">
    <form id="form_send_to_a_friend" method="post" action="/php/ajax/ajax.send_to_friend.php">
      <label for="form_yourname">Your Name</label>
      <label for="form_youremail">Your Email Address</label>
      <br />
      <input type="text" id="form_yourname" name="yourname" placeholder="Jack" />
      <input type="email" id="form_youremail" name="youremail" placeholder="jack@example.com" />
      <br />
      <br />
      <label for="form_friendname">Friend's Name</label>
      <label for="form_friendemail">Friend's Email Address</label>
      <br />
      <input type="text" id="form_friendname" name="friendname" placeholder="Diane" />
      <input type="email" id="form_friendemail" name="friendemail" placeholder="diane@example.com" />
      <br />
      <br />
      <label for="form_message">Enter an optional message to send</label>
      <br />
      <textarea rows=3 id="form_friendmessage" name="friendmessage" placeholder="Check out this course at Fast Response!"></textarea>
      <br />
      <input type="submit" value="Send" name="submit" />
      <button type="reset" name="clear">Clear</button>
      <button type="button" name="close">Close</button>
    </form>

    <div id="form_message" style="display: none;">
      <div></div>
      <button type="button" name="send_again">Send to another friend</button>
    </div>

  </div>
</div>

<script type="text/javascript">

if (typeof fadetime === 'undefined') {
  fadetime = 900;
}

jQuery('#send_to_a_friend .title, #send_to_a_friend button[name=close]').click( function() {
  jQuery('#send_to_a_friend').hide(fadetime);
} );

jQuery('#form_send_to_a_friend').submit(function(eventObj) {
  eventObj.preventDefault();

  var loc = window.location;
  var pageurl = loc.protocol + '//' + loc.hostname + loc.pathname;
  var serial = jQuery(this).serializeArray();
  serial.push({name: 'form_pageurl', value: pageurl});
  serial.push({name: 'form_pagetitle', value: 'Stuff here'});

  function display_message(data) {
    jQuery('#form_send_to_a_friend').slideUp(fadetime).fadeOut(fadetime);
    jQuery('#form_message').slideDown(fadetime).fadeIn(fadetime);
    jQuery('#form_message>div').html(data);
  }

  jQuery.ajax({
    type: 'POST',
    url: jQuery(this).attr('action'),
    data: serial,
    dataType: 'html',

    success: function(data, textStatus, jqxhr) {
      jQuery('#form_message>div').addClass('form_success');
      display_message('It worked?');
    },

    error: function(jqxhr, textStatus, errorThrown) {
      jQuery('#form_message>div').addClass('form_error');
      display_message(errorThrown);
    }
  });
});

jQuery('button[name="send_again"]').submit(function(eventObj) {
  eventObj.preventDefault();

  jQuery('#form_friendname, #form_friendemail').val('');

  jQuery('#form_send_to_a_friend').slideDown(fadetime).fadeIn(fadetime);
  jQuery('#form_message').slideUp(fadetime).fadeOut(fadetime);
});

</script>
