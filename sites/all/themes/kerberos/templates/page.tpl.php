<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
  </head>
  <body<?php print kerberos_body_class($left, $right); ?>>

    <!-- Layout -->
    <div id="ting-bar"></div>
    <div id="wrapper">
      <?php if ($site_logo): print $site_logo; endif; ?>
    
      <?php if ($region_mainmenu): print $region_mainmenu; endif; ?>
    
      <?php if ($breadcrumb): print $breadcrumb; endif; ?>
    
      <?php if ($top_of_page): print 'div id="header-content" class="region">'. $top_of_page .'</div>'; endif; ?> 
    
      <div id="content">
        <?php if ($title): print '<h1>'. $title .'</h1>'; endif; ?>
        <?php print $content ?>
      </div>
      
      <?php if ($menu_right || $right):?>
        <div id="siderbar-right">
          <?php print $menu_right ?>
          <?php print $right ?>
        </div>
      <?php endif; ?>
    
      <?php if ($bottom_of_page): print 'div id="secondary-content" class="region">'. $bottom_of_page .'</div>'; endif; ?>
      
      <?php if($footer_1 || $footer_2 || $footer_3 || $footer_4): ?>
        <ul id="footer">
          <li>
            <?php print $footer_1 ?>
          </li>
          <li>
            <?php print $footer_2 ?>
          </li>
          <li>
            <?php print $footer_3 ?>
          </li>
          <li>
            <?php print $footer_4 ?>
          </li>
        </ul>
      <?php endif; ?>    
    </div>
    <?php print $closure ?>
  </body>
</html>
