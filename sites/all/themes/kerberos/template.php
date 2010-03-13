<?php

/**
 * Sets the body-tag class attribute.
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 * Based on Garland
 */
 
function kerberos_body_class($left, $right) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

/**
 * Add conditional stylesheets:
 * For more information: http://msdn.microsoft.com/en-us/library/ms537512.aspx
 * template.php implementation based on Genesis Theme by jmburnz.
 */
 
function kerberos_theme(&$existing, $type, $theme, $path){
  
  // Compute the conditional stylesheets.
  if (!module_exists('conditional_styles')) {
    include_once $base_path . drupal_get_path('theme', 'kerberos') . '/includes/template.conditional-styles.inc';
    // _conditional_styles_theme() only needs to be run once.
    if ($theme == 'kerberos') {
      _conditional_styles_theme($existing, $type, $theme, $path);
    }
  }  
  $templates = drupal_find_theme_functions($existing, array('phptemplate', $theme));
  $templates += drupal_find_theme_templates($existing, '.tpl.php', $path);
  return $templates;
}

/**
 * Override or insert variables into page templates.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called.
 */
function kerberos_preprocess_page(&$vars, $hook) {
  global $theme;

  // Don't display empty help from node_help().
  if ($vars['help'] == "<div class=\"help\"> \n</div>") {
    $vars['help'] = '';
  }

  // Add conditional stylesheets.
  if (!module_exists('conditional_styles')) {
    $vars['styles'] .= $vars['conditional_styles'] = variable_get('conditional_styles_' . $GLOBALS['theme'], '');
  }

  // Set variables for the logo and site_name.
  if (!empty($vars['logo'])) {
    // Return the site_name even when site_name is disabled in theme settings.
    $vars['logo_alt_text'] = variable_get('site_name', '');
    $vars['site_logo'] = '<a id="site-logo" href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home"><img src="'. $vars['logo'] .'" alt="'. $vars['logo_alt_text'] .'" /></a>';
  }

  // Remove the useless page-arg(0) class.
  if ($class = array_search(preg_replace('![^abcdefghijklmnopqrstuvwxyz0-9-]+!s', '', 'page-'. drupal_strtolower(arg(0))), $classes)) {
    unset($classes[$class]);
  }

  /**
   * Additional body classes to help out themers.
   */
  if (!$vars['is_front']) {
    $normal_path = drupal_get_normal_path($_GET['q']);
    // Set a class based on Drupals internal path, e.g. page-node-1. 
    // Using the alias is fragile because path alias's can change, $normal_path is more reliable.
    $classes[] = safe_string('page-'. $normal_path);
    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        $classes[] = 'page-node-add'; // Add .node-add class.
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        $classes[] = 'page-node-'. arg(2); // Add .node-edit or .node-delete classes.
      }
    }
  }
  $vars['classes'] = implode(' ', $classes); // Concatenate with spaces.
}
