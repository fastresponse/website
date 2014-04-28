<div id="send_to_a_friend" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Send to a Friend</h1>
    </div>
  </div>
  <div class="body">
    <form id="form_send_to_a_friend" method="post" action="">
      <input type="text" name="yourname" placeholder="Your Name" />
      <input type="email" name="youremail" placeholder="Your Email Address" />
      <br />
      <input type="text" name="friendname" placeholder="Friend's Name" />
      <input type="email" name="friendemail" placeholder="Friend's Email Address" />
      <br />
      <textarea rows=3 placeholder="Enter a note to send with the page"></textarea>
      <br />
      <input type="submit" value="Send" name="submit" />
      <button type="reset" name="clear">Clear</button>
      <button type="button" name="close">Close</button>
    </form>
  </div>
</div>

<script type="text/javascript">
jQuery('#send_to_a_friend .title, #send_to_a_friend button[name=close]').click( function() {
  jQuery('#send_to_a_friend').hide(900);
} );
</script>
