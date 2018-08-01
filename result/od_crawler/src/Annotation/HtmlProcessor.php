<?php

namespace Drupal\od_crawler\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a HTML Processor item annotation object.
 *
 * @see \Drupal\od_crawler\HtmlProcessorManager
 * @see plugin_api
 *
 * @Annotation
 */
class HtmlProcessor extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
