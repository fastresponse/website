<?php
  $video_number = null;
  $video_width = 500;
  $video_height = 375;

  $video_numbers = array(
    'EMT' => 1003789,
    'Phlebotomy' => null,
  );
  if (in_array($program_of_interest, array_keys($video_numbers)))
    $video_number = $video_numbers[$program_of_interest];
  
  // dynamic load w/ ajax?
?>
<?php if ($video_number): ?>
<div class="video-content">
  <object data="http://view.vzaar.com/<?= $video_number ?>/flashplayer" class="video-object" type="application/x-shockwave-flash" height="<?= $video_height ?>" width="<?= $video_width ?>">
  
    <param name="allowFullScreen" value="true" />
    <param name="allowScriptAccess" value="always" />
    <param name="wmode" value="transparent" />
    <param name="movie" value="http://view.vzaar.com/<?= $video_number ?>/flashplayer" />
    <param name="flashvars" value="border=none&colourSet=blue&showplaybutton=true" />
    <video controls class="video-element" onclick="this.play();"
      poster="http://view.vzaar.com/<?= $video_number ?>/image" 
      preload="none" src="http://view.vzaar.com/<?= $video_number ?>/video" 
      height="<?= $video_height ?>" width="<?= $video_width ?>">
    </video>
  </object>
</div>
<?php endif; ?>
