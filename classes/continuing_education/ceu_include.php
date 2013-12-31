	  <div style="float: right; width: 300px; max-width: 45%; margin: 0 0 0 50px;">
	    <div class="announcement red">
	      <h3 style="margin-top: 0; margin-bottom: 0; text-align: center;"><strong class="underline">Attention</strong></h3>
        <h3 style="margin-top: 0;">Employees of Alta Bates Medical Center and Alameda County Medical Center</h3>
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
	  </div>

