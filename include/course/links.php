<div id="links" class="module article-box">
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
if (!$handle) $handle = db_connect();

function query_links($dbh, $textarr) {
  $select = array('text', 'link', 'target');
  $table = 'buttons';

  $where = array('text in (\'' . implode('\',\'', $textarr) . '\')');

  $params = array();
  //$params[':text'] = $text;

  $result = basic_query($dbh, $select, $table, $where, null, 0, $params);

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
      <li><a id="send_to_a_friend" href="#">Send to a Friend</a></li>
      <?php foreach (query_links($handle, $links) as $link_data): ?>
      <li><a href="<?= $link_data['link'] ?>" <?= ($link_data['target'] ? "target=\"{$link_data['target']}\"" : '') ?>><?= $link_data['text'] ?></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
