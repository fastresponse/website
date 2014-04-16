<?php
$counter = 1;
?>

<div id="faqs_list" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>FAQs</h1>
    </div>
  </div>
  <div class="body">
    <ol>
      <?php foreach($global_faqs as $faq_qa): ?>
      <li><a name="faq_<?= $counter ?>"><?= key($faq_qa) ?></a>
      <div><?= current($faq_qa) ?></div>
      </li>
      <?php $counter++; endforeach; ?>
      <?= (count($faqs) ? '<hr />' : '') ?>
      <?php foreach($faqs as $faq_qa): ?>
      <li><a name="faq_<?= $counter ?>"><?= key($faq_qa) ?></a>
      <div><?= current($faq_qa) ?></div>
      </li>
      <?php $counter++; endforeach; ?>
      <div style="text-align: center; margin-top: 10px;"><button type="button" name="close">Close</button></div>
    </ol>
  </div>
</div>

<script type="text/javascript">
jQuery('#faqs_list .title, #faqs_list button[name=close]').click( function() {
  jQuery('#faqs_list').hide(900);
} );
</script>
