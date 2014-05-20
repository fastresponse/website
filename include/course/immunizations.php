<div id="immunizations" class="module article-box">
  <div class="title">
    <div class="title-border">
      <h1>Immunization Requirements</h1>
    </div>
  </div>
  <div class="body">
    <ul>
      <li>Measles</li>
      <li>Mumps</li>
      <li>Rubella</li>
      <li>Tuberculosis</li>
      <li>Tetanus</li>
      <li>Hepatitis B</li>
      <li>Influenza</li>
      <li>Varicella Zoster (Chicken Pox)</li>
    </ul>
    <hr />
    <?php
    $imms = $links['Immunizations'];
    ?>
    <div><a class="underline" href="<?= $imms['link'] ?>" target="<?= $imms['target'] ?>">Full immunization details here</a></div>
  </div>
</div>
