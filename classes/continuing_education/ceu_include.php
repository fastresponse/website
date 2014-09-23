	  <div style="float: right; width: 300px; max-width: 45%; margin: 0 0 0 50px;">
	    <div id="ceu-announce" class="announcement red">
	      <h3 style="margin-top: 0; margin-bottom: 0; text-align: center;"><strong class="underline">Attention</strong></h3>
        <h3 style="margin-top: 0; text-align: center;">Employees of the following medical facilities:</h3>
        <ul style="padding-left: 15px; margin-left: 0; font-size: 90%;">
          <li>Alta Bates Medical Center (RNs only)</li>
          <li>Alameda County Medical Center</li>
          <li>WestMed Ambulance</li>
          <li>Pro Transport-1</li>
        </ul>
	      <div class="yellow">
	        You must register by phone at <a href="tel://1-510-849-4009" class="yellow" style="white-space: nowrap;">510-849-4009</a>. Online registrations are not permitted.
	      </div>
	      <?php
          if (isset($announcement_sections)) {
		        foreach ($announcement_sections as $sect) {
		          echo "<hr />\n$sect\n";
		        }
		      }
        ?>
	    </div>
      <div id="ceu-promos" class="announcement yellow" style="font-size: small; display: none;">
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

