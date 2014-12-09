<div id="registration" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Online Registration</h1>
    </div>
  </div>
  <div class="body">
    <ul>
      <?php foreach ($global_links as $link_text => $link_url): ?>
      <li><a href="<?= $link_url ?>"<?= (url_new_tab($link_url) ? ' target="_blank"' : '')  ?>><button type="button"><?= $link_text ?></button></a></li>
      <?php endforeach; ?>
      <?php foreach ($links as $link_text => $link_url): ?>
      <li><a href="<?= $link_url ?>"<?= (url_new_tab($link_url) ? ' target="_blank"' : '')  ?>><button type="button"><?= $link_text ?></button></a></li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
