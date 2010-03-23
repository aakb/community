  <?php if ($content['mission']) { ?>
  <div class="panel-3-1-2-stacked panel-col-mission">
    <?php print $content['mission']; ?>
  </div>
  <?php } ?>

  <?php if ($content['top-left'] || $content['top-middle'] || $content['top-right']) { ?>
    <ul class="panel-3-1-2-stacked panel-3-1-2-toprow">  
      <li class="panel-col-topleft">
        <?php print $content['top-left']; ?>
      </li>
      <li class="panel-col-topright">
        <?php print $content['top-right']; ?>
      </li>
      <li class="panel-col-topmiddle">
        <?php print $content['top-middle']; ?>
      </li>
    </ul>
  <?php } ?>
  
  <?php if ($content['top']) { ?>
  <div class="panel-3-1-2-stacked panel-col-top">
    <?php print $content['top']; ?>
  </div>
  <?php } ?>
  
  <?php if ($content['left']) { ?>
    <div class="panel-3-1-2-stacked panel-col-content">
      <?php print $content['left']; ?>
    </div>
  <?php } ?>
  
  <?php if ($content['right']) { ?>
  <div class="panel-3-1-2-stacked panel-col-sidebar">
    <?php print $content['right']; ?>
  </div>
  <?php } ?>
  
  <?php if ($content['bottom']) { ?>
  <div class="panel-3-1-2-stacked panel-col-bottom">
    <?php print $content['bottom']; ?>
  </div>
  <?php } ?>

