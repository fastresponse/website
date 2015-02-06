<div id="registration" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Registration</h1>
    </div>
  </div>
  <div class="body">
    <?php foreach ($global_links as $link_text => $link_url): ?>
    <div class="basic-button">
      <a href="<?= $link_url ?>"<?= (url_new_tab($link_url) ? ' target="_blank"' : '')  ?>><div><?= $link_text ?></div></a>
    </div>
    <?php endforeach; ?>
    <?php foreach ($links as $link_text => $link_url): ?>
    <div class="basic-button">
      <a href="<?= $link_url ?>"<?= (url_new_tab($link_url) ? ' target="_blank"' : '')  ?>><div><?= $link_text ?></div></a>
    </div>
    <?php endforeach; ?>
    <dl>
      <dt>Phone:</dt>
      <dd><a href="tel://1-510-849-4009">510-849-4009</a></dd>
      <br />
      <dt>Email:</dt>
      <dd><a href="mailto:info@fastresponse.org">info@fastresponse.org</a></dd>
    </dl>
  </div>
</div>
