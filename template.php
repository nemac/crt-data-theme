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
    if (array_key_exists('field_header', $variables['element'][$delta]['entity']['field_collection_item'][$item['value']])) {
      $header = $variables['element'][$delta]['entity']['field_collection_item'][$item['value']]['field_header']['#items']['0']['value'];
      $table_of_contents .= '<li><a href="#' . str_replace(' ', '_', $header) . '">' . $header . '</a></li>';
    }
  }

  if ($table_of_contents != '') {
    $table_of_contents = '<div class="table_of_contents"><ol>' . $table_of_contents . '</ol></div>';
  }

  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field__label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field__items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $element = current($item['entity']['field_collection_item']);
    if (array_key_exists('field_feature', $element) && $element['field_feature']['#items']['0']['value'] == '1') {
      $feature = TRUE;
    } else {
      $feature = FALSE;
    }
    $classes = 'field__item ' . ($delta % 2 ? 'odd' : 'even') . ($feature ? ' crt-feature' : '');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = $table_of_contents . '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

function crt_field__field_content__tool($variables) {
  $table_of_contents = '';

  foreach($variables['element']['#items'] as $delta => $item) {
    if (array_key_exists('field_header', $variables['element'][$delta]['entity']['field_collection_item'][$item['value']])) {
      $header = $variables['element'][$delta]['entity']['field_collection_item'][$item['value']]['field_header']['#items']['0']['value'];
      $table_of_contents .= '<li><a href="#' . str_replace(' ', '_', $header) . '">' . $header . '</a></li>';
    }
  }

  if ($table_of_contents != '') {
    $table_of_contents = '<div class="table_of_contents"><ol>' . $table_of_contents . '</ol></div>';
  }

  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field__label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field__items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $element = current($item['entity']['field_collection_item']);
    if (array_key_exists('field_feature', $element) && $element['field_feature']['#items']['0']['value'] == '1') {
      $feature = TRUE;
    } else {
      $feature = FALSE;
    }
    $classes = 'field__item ' . ($delta % 2 ? 'odd' : 'even') . ($feature ? ' crt-feature' : '');
    $output .= '<div class="' . $classes . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</div>';
  }
  $output .= '</div>';

  // Render the top-level DIV.
  $output = $table_of_contents . '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}

function crt_field__field_content__case_study($variables) {
  $table_of_contents = '';

  foreach($variables['element']['#items'] as $delta => $item) {
    if (array_key_exists('field_header', $variables['element'][$delta]['entity']['field_collection_item'][$item['value']])) {
      $header = $variables['element'][$delta]['entity']['field_collection_item'][$item['value']]['field_header']['#items']['0']['value'];
      $table_of_contents .= '<li><a href="#' . str_replace(' ', '_', $header) . '">' . $header . '</a></li>';
    }
  }

  if ($table_of_contents != '') {
    $table_of_contents = '<div class="table_of_contents"><ol>' . $table_of_contents . '</ol></div>';
  }

  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field__label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field__items"' . $variables['content_attributes'] . '>';
  foreach ($variables['items'] as $delta => $item) {
    $element = current($item['entity']['field_collection_item']);
    if (array_key_exists('field_feature', $element) && $element['field_feature']['#items']['0']['value'] == '1') {
      $feature = TRUE;
    } else {
      $feature = FALSE;
    }
    $classes = 'field__item ' . ($delta % 2 ? 'odd' : 'even') . ($feature ? ' crt-feature' : '');
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

function field_collection_item__field_content__full($variables) {
  $output = '';

  $output .= '<div class="' . $variables['classes'] .  '"' . $variables['attributes'] . '>';
  $output .= '<div class="content"' . $variables['content_attributes'] . '>';
  $output .= render($content);
  $output .= '</div>';
  $output .= '</div>';

  return $output;
}