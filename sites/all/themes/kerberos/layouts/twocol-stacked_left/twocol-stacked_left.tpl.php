<?php
// $Id: panels-twocol-stacked.tpl.php,v 1.1.2.1 2008/12/16 21:27:59 merlinofchaos Exp $
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * additional areas for the top and the bottom.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['top']: Content in the top row.
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 *   - $content['bottom']: Content in the bottom row.
 *
 * if (!empty($css_id)) { print "id=\"$css_id\""; }
 */
?>
  
  <?php if ($content['top']) { ?>
  <div class="panel-2col-stacked_left panel-col-top">
    <?php print $content['top']; ?>
  </div>
  <?php } ?>
  
  <?php if ($content['left']) { ?>
    <div class="panel-2col-stacked_left panel-col-content">
      <?php print $content['left']; ?>
    </div>
  <?php } ?>
  
  <?php if ($content['right']) { ?>
  <div class="panel-2col-stacked_left panel-col-sidebar">
    <?php print $content['right']; ?>
  </div>
  <?php } ?>
  
  <?php if ($content['bottom']) { ?>
  <div class="panel-2col-stacked_left panel-col-bottom">
    <?php print $content['bottom']; ?>
  </div>
  <?php } ?>

