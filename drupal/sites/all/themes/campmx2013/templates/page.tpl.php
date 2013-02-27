<?php 
/**
 * @file
 * Alpha's theme implementation to display a single Drupal page.
 */
?>
<?php if ($is_front): ?>
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/themes/campmx2013/css/front.css" />
<?php endif; ?>
<div<?php print $attributes; ?>>
  <?php if (isset($page['header'])) : ?>
    <?php print render($page['header']); ?>
  <?php endif; ?>
  
  <?php if (isset($page['content'])) : ?>
    <?php print render($page['content']); ?>
  <?php endif; ?>  
  
  <?php if (isset($page['footer'])) : ?>
    <?php print render($page['footer']); ?>
  <?php endif; ?>
</div>