<?php
// $Id: content-field.tpl.php,v 1.1.2.6 2009/09/11 09:20:37 markuspetrux Exp $

/**
 * @file content-field.tpl.php
 * Default theme implementation to display the value of a field.
 *
 * Available variables:
 * - $node: The node object.
 * - $field: The field array.
 * - $items: An array of values for each item in the field array.
 * - $teaser: Whether this is displayed as a teaser.
 * - $page: Whether this is displayed as a page.
 * - $field_name: The field name.
 * - $field_type: The field type.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $label: The item label.
 * - $label_display: Position of label display, inline, above, or hidden.
 * - $field_empty: Whether the field has any valid value.
 *
 * Each $item in $items contains:
 * - 'view' - the themed view for that item
 *
 * @see template_preprocess_content_field()
 */
?>
<?php if (!$field_empty) : ?>
  <?php if ($label_display == 'above') : ?>
    <h3 class="field-label"><?php print t($label) ?>:&nbsp;</h3>
  <?php endif;?>
<p class="field field-type-<?php print $field_type_css ?> field-<?php print $field_name_css ?>">
  <?php $count = 1;
    foreach ($items as $delta => $item) :
      if (!$item['empty']) : ?>
          <?php if ($label_display == 'inline') { ?>
            <span class="field-label-inline<?php print($delta ? '' : '-first')?>">
              <?php print t($label) ?>:&nbsp;</span>
          <?php } ?>
          <?php print $item['view'] ?>
      <?php $count++;
      endif;
    endforeach;?>
</p>
<?php endif; ?>
