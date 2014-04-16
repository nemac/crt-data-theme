<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * crt theme.
 */

/**
 * Overrides theme_field
 * Returns HTML for a field.
 *
 * @ingroup themeable
 */
function crt_field__field_imageref__field_content($variables) {
  $referenced_entity = $variables['element']['#object']->field_imageref[LANGUAGE_NONE]['0']['entity'];
  $image = $referenced_entity->field_image[LANGUAGE_NONE]['0'];
  $image_render = array(
			'path' => $image['uri'],
			'title' => $image['title'],
			'alt' => $image['alt'],
			'attributes' => array(),
			);

  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<div class="field__label"' . $variables['title_attributes'] . '>' . $variables['label'] . ':&nbsp;</div>';
  }

  // Render the items.
  $output .= '<div class="field__items"' . $variables['content_attributes'] . '>';
  $output .= theme_image($image_render);
  $output .= '</div>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . '"' . $variables['attributes'] . '>' . $output . '</div>';

  return $output;
}
