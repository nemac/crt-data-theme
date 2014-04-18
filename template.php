<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * crt theme.
 */

/**
 * Returns HTML for a field.
 *
 * @ingroup themeable
 */
function crt_field__field_content__topic($variables) {
  $table_of_contents = '';

  foreach($variables['element']['#items'] as $delta => $item) {
    $header = $variables['element'][$delta]['entity']['field_collection_item'][$item['value']]['field_header']['#items']['0']['value'];
    $table_of_contents .= '<li><a href="#' . str_replace(' ', '_', $header) . '">' . ($delta + 1) . '. ' . $header . '</a></li>';
  }

  $table_of_contents = '<div class="topic_table_of_contents"><ul>' . $table_of_contents . '</ul></div>';

  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field__label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field__items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field__item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = $table_of_contents . '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

/**
 * Returns HTML for a field.
 *
 * @ingroup themeable
 */
function crt_field__field_header__field_content($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field__label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field__items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $classes = 'field__item ' . ($delta % 2 ? 'odd' : 'even');
    $output .= '<div id="' . str_replace(' ', '_', $item['#markup']) . '" class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}
