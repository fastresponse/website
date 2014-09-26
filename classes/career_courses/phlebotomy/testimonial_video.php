<div id="testimonial_video" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Testimonial</h1>
    </div>
  </div>
  <div class="body">
    <?php
      $num = 1399035;
      $width = 280;
      $height = 190;
    ?>
    <div style="text-align: center;" class="video-content">
      <object data="http://view.vzaar.com/<?= $num ?>/flashplayer"
              class="video-object" type="application/x-shockwave-flash"
              height=<?= $height ?> width=<?= $width ?>>
        <param name="allowFullScreen" value="true" />
        <param name="allowScriptAccess" value="always" />
        <param name="wmode" value="transparent" />
        <param name="movie" value="http://view.vzaar.com/<?= $num ?>/flashplayer" />
        <param name="flashvars"
               value="border=none&amp;colourSet=blue&amp;showplaybutton=true" />
        <video controls class="video-element" onclick="this.play();"
               poster="http://view.vzaar.com/<?= $num ?>/image" 
               preload="none" src="http://view.vzaar.com/<?= $num ?>/video" 
               height=<?= $height ?> width=<?= $width ?>></video>
      </object>
    </div>
  </div>
</div>
