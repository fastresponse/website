<?php
$counter = 1;
?>

<div id="faqs_menu" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>FAQs</h1>
    </div>
  </div>
  <div class="body">
    <ol>
      <?php foreach ($global_faqs as $faq_qa): ?>
      <li><a href="#faq_<?= $counter ?>"><?= key($faq_qa) ?></a></li>
      <?php $counter++; endforeach; ?>
      <?= (count($faqs) ? '<hr />' : '') ?>
      <?php foreach ($faqs as $faq_qa): ?>
      <li><a href="#faq_<?= $counter ?>"><?= key($faq_qa) ?></a></li>
      <?php $counter++; endforeach; ?>
    </ol>
  </div>
</div>

<script type="text/javascript">
jQuery('#faqs_menu .body ol li a').click( function(eventObj) {
  jQuery('#faqs_list').show(900);
  jQuery('body').scrollTop(
    jQuery('#faqs_list').offset().top - (jQuery(window).height() / 5)
  );
  eventObj.preventDefault();
} );
</script>
