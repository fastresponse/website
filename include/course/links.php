<div id="links" class="module article-box">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (!$handle) $handle = db_connect();

function query_links($dbh, $textarr) {
  $select = array('text', 'link', 'target');
  $table = 'buttons';

  $textstr = '\'' . implode('\',\'', $textarr) . '\''; 

  $where = array('text in (' . $textstr . ')');
  $order = 'FIELD(text, ' . $textstr . ')';

  $params = array();
  //$params[':text'] = $text;

  $result = basic_query($dbh, $select, $table, $where, $order, 0, $params);

  return $result;
}
?>
  <div class="title">
    <div class="title-border">
      <h1>Links</h1>
    </div>
  </div>
  <div class="body">
    <ul>
      <li><a id="link_send" href="#send_to_a_friend">Send to a Friend</a></li>
      <?php foreach (query_links($handle, $global_links) as $link_data): ?>
      <li><a href="<?= $link_data['link'] ?>" <?= ($link_data['target'] ? "target=\"{$link_data['target']}\"" : '') ?>><?= $link_data['text'] ?></a></li>
      <?php endforeach; ?>
      <hr />
      <?php foreach (query_links($handle, $links) as $link_data): ?>
      <li><a href="<?= $link_data['link'] ?>" <?= ($link_data['target'] ? "target=\"{$link_data['target']}\"" : '') ?>><?= $link_data['text'] ?></a></li>
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
