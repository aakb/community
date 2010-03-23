<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
  </head>
  <body class="<?php print $body_classes; ?>"> 
    <?php if ($region_mainmenu): print '<div id="main-menu">'. $region_mainmenu .'</div>'; endif; ?>
    <div id="outer-wrapper">
    <div id="wrapper">
      <?php if ($site_logo): print $site_logo; endif; ?>                
      <?php if ($is_front): print '<p id="mission">'. $mission .'</p>'; endif; ?>
      <?php if (!$is_front): print $breadcrumb; endif; ?>
        
      <div id="content">
        <?php if ($title): print '<h1>'. $title .'</h1>'; endif; ?>
        <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
        <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
        <?php if ($show_messages && $messages): print $messages; endif; ?>
        <?php print $help; ?>
        <?php print $content ?>
      </div>
    
      <?php if ($bottom_of_page): print '<div id="secondary-content" class="region">'. $bottom_of_page .'</div>'; endif; ?>      
    </div>
    </div>
    <?php if($footer_1 || $footer_2 || $footer_3 || $footer_4): ?>
      <div id="footer">
        <ul id="footer-inner">
          <li>
            <?php print $footer_1; ?>
          </li>
          <li>
            <?php print $footer_2; ?>
          </li>
          <li>
            <?php print $footer_3; ?>
          </li>
          <li>
            <?php print $footer_4; ?>
          </li>
        </ul>
      </div>
    <?php endif; ?>        
    <?php print $closure ?>
  </body>
</html>