<?php

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



  // Add template suggestions and alter output based on url alias
  if (module_exists('path')) {
  
    // Get url alias og isolate last segment
    $url_alias = drupal_get_path_alias($_GET['q']);
    $alias_parts = explode('/', $url_alias);
    $last = array_reverse($alias_parts);
    $last_part = $last[0];

    // Check for and exclude edit pages
    if ($last_part != "edit") {

      // Create array for template suggestions
      $templates = array ();
      $template_name = "page";
      
      // Add url-segments to template suggestions
      foreach ($alias_parts as $part) {
        if ($part != "page") {
          $vars['template_files'][] = $template_name . '-' . $part;
        }
      } // end of foreach loop
    } // end of edit check
      
    // Check for subprojects    
    if ($alias_parts[0] == "dting") {
    
      // Change site logo and text to project ID
      switch ($alias_parts[1]) {
        // If ding.TING subproject
        case "forside" :
        case "" :        
          $vars['logo_alt_text'] = "ding.TING";
          $vars['logo'] = '/'. drupal_get_path('theme', 'Kerberos') ."/images/logo-dingting-front.png";
          break;
        default:
          $vars['logo_alt_text'] = "ding.TING";
          $vars['logo'] = '/'. drupal_get_path('theme', 'Kerberos') ."/images/logo-dingting-default.png";
          break;
      }
    } // end of check for subprojects    
  } // end of if module exist

  // Check for frontpage
  if ($vars['is_front']) {
    // If so - exchange logo for large, frontpage version
    $vars['logo'] = '/'. drupal_get_path('theme', 'Kerberos') ."/images/logo-tingconcept-front.png";
  }

  // Set variables for the logo and site_name.
  if (!empty($vars['logo'])) {
    // Return the site_name even when site_name is disabled in theme settings.
    $vars['logo_alt_text'] = (empty($vars['logo_alt_text']) ? variable_get('site_name', '') : $vars['logo_alt_text']);
    $vars['site_logo'] = '<a id="site-logo" href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home"><img src="'. $vars['logo'] .'" alt="'. $vars['logo_alt_text'] .'" /></a>';
  }  
}

/**
 * Add current page to breadcrumb
 */

function kerberos_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    $title = drupal_get_title();
    if (!empty($title)) {
      $breadcrumb[]=$title;
    }
    return '<div class="breadcrumb">'. implode(' » ', $breadcrumb) .'</div>';
  }
} 


