<?php

function campmx2013_alpha_preprocess_html(&$vars){
  drupal_add_css(drupal_get_path('theme', 'campmx2013') .  '/css/ram.css', array('type' => 'file','group' => 2000,'media' => 'all','weight' => 100));
}
