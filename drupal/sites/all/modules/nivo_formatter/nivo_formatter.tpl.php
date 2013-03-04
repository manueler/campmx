<?php
/**
 * @file nivo_formatter.tpl.php
 * Main Nivo Slider template
 * 
 * Variables avaiable:
 * - $nivo_slider_theme: A name of current theme.
 * - $images: An array of ready to print image.
 * 
 */
?>
<div class="slider-wrapper theme-<?php print $nivo_slider_theme; ?> controlnav-thumbs">
  <div class="ribbon"></div>
  <div id="slider<?php print '-' . $field_name; ?>" class="nivoSlider <?php $isThumb ? print 'nivoSlider-thumb' : FALSE; ?>">
  <?php if($images): ?>
  <?php foreach($images as $id => $image): ?>
  
    <?php print $image; ?>
  
  <?php endforeach; ?>
  <?php endif; ?>
  </div>
</div>