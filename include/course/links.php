<div id="links" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Links</h1>
    </div>
  </div>
  <div class="body">
    <ul>
      <li><a id="link_send" href="#send_to_a_friend">Send to a Friend</a></li>
      <?php foreach ($global_links as $link_text => $link_data): ?>
      <li><a href="<?= $link_data['link'] ?>" <?= ($link_data['target'] ? "target=\"{$link_data['target']}\"" : '') ?>><?= $link_text ?></a></li>
      <?php endforeach; ?>
      <hr />
      <?php foreach ($links as $link_text => $link_data): ?>
      <li><a href="<?= $link_data['link'] ?>" <?= ($link_data['target'] ? "target=\"{$link_data['target']}\"" : '') ?>><?= $link_text ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>

<script type="text/javascript">
jQuery('#link_send').click( function(eventObj) {
  jQuery('#send_to_a_friend').show(900);
  jQuery('body').scrollTop(
    jQuery('#send_to_a_friend').offset().top - (jQuery(window).height() / 5)
  );
  eventObj.preventDefault();
} );
</script>
