<div id="ceu_promotions" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Promotions</h1>
    </div>
  </div>
  <div class="body">

  <?php
  include_once($_SERVER['DOCUMENT_ROOT'] . '/php/dbconn.php');
  if (!isset($handle)) $handle = db_connect();

  $results = basic_query($handle,
    array('title', 'description', 'notes'),
    'promotions',
    array('active = 1', 'FIND_IN_SET(:course, courses)'),
    'id ASC',
    0,
    array(':course' => $course_abbr)
  );

  if (!isset($results) || !count($results)) {
    $results = array( array(
      'title' => 'No Promotions',
      'description' => 'There are no promotions active at this time.',
    ) );
  }

  $i = 0;

  foreach ($results as $promo):
  ?>
    <?php if ($i++ > 0): ?>
    
    <hr />
    <?php endif; ?>

    <h3 style="margin-top: 0; text-align: center;" class="red underline"><?= $promo['title'] ?></h3>
    <div><?= nl2br($promo['description']) ?></div>

    <?php if (isset($promo['notes'])): ?>
    <ul style="margin: 15px 0 0 18px; padding: 0; font-size: 90%;" class="red">
      <?php foreach (explode("\n", $promo['notes']) as $note): ?>
      <li><?= $note ?></li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
  <?php endforeach; ?>

    <hr />

    <p class="yellow">In order to receive any discount, you must register by phone at <a href="tel://1-510-849-4009" class="red" style="white-space: nowrap;">510-849-4009</a>. Online registrations will <span class="underline">not</span> receive a discount.</p>
    <p class="yellow">Discounts do not apply to any required course books.</p>
    <p class="yellow" style="margin-bottom: 0;">Multiple discounts may not be combined.</p>

  </div>
</div>
