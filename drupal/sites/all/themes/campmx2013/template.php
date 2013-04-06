<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
function campmx2013_preprocess_page(&$variables){
  if(drupal_is_front_page()){
    drupal_add_js('sites/all/themes/campmx2013/js/index.js'); 
  }else{
    //drupal_set_message("No es el front");
  }

  if (isset($_GET['template']) && $_GET['template'] == 'colorbox') {
    $variables['theme_hook_suggestions'][] = 'page__colorbox';
  }
}

function campmx2013_preprocess_user_register_form(&$vars) {
  //drupal_add_css(drupal_get_path('theme', 'campmx2013') . "/css/registro.css");

	drupal_add_css(drupal_get_path('theme', 'campmx2013') . 'css/registro.css', array('group' => CSS_THEME, 'type' => 'file')); 
	print_r("hola");
}

function campmx2013_preprocess_node($vars) {

  //if (drupal_get_path_alias("node/{$vars['#node']->nid}") == 'foo') {

	if(current_path() == 'node/218'  )
	//if(current_path() == 'node/202'  )
	{
    drupal_add_css(drupal_get_path('theme', 'campmx2013') . "/css/hotel.css");
    drupal_add_js('sites/all/themes/campmx2013/js/hotel.js');

      global $user;
  if ($user->uid == 0) {
    $vars['loginpopup'] = "<div style='display:none'>" ;
    $vars['loginpopup'] .= "<div id='login-pop'>" ;
    $vars['loginpopup'] .= drupal_render(drupal_get_form('user_login'));
    $vars['loginpopup'] .= "</div>";
    $vars['loginpopup'] .= "</div>";
  }
  }
}

/**
 * A preprocess function for our theme('flag'). It generates the
 * variables needed there.
 *
 * The $variables array initially contains the following arguments:
 * - $flag
 * - $action
 * - $content_id
 * - $after_flagging
 *
 * See 'flag.tpl.php' for their documentation.
 */
function campmx2013_preprocess_flag(&$variables) {
  global $user;

  // Some typing shotcuts:
  $flag =& $variables['flag'];

  if ($flag->name == 'workshop_register') {
    $account = user_load($user->uid);
    $node = node_load($variables['content_id']);
    $ok_to_print = FAlSE;
    foreach ($node->field_tracks['und'] as $item) {
      if ($item['tid'] == 23) { // this is a track session
        $ok_to_print = TRUE;
      }
    }
    if (empty($account->field_asistencia_confirmada['und'][0]['value'])) {
      $ok_to_print = FALSE;
    }
    if (!$ok_to_print) {
      $variables['flag_wrapper_classes'] .= ' element-hidden';
    }
  }
}
