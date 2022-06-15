<?php

namespace Drupal\od_crawler\Plugin\HtmlProcessor;

use Drupal\od_crawler\HtmlProcessorBase;

/**
 * Provides an HTML Generator meta tag processor.
 *
 * @HtmlProcessor(
 *   id = "html_generator",
 *   label = @Translation("Generator"),
 * )
 */
class HtmlGeneratorProcessor extends HtmlProcessorBase {

  /**
   * Returns the content of the Generator meta tag.
   *
   * @return string
   *   The generator tag. Empty string if not found.
   */
  public function process() {
    $node = $this->domObject->find('meta[name=Generator]', 0);
    return isset($node) ? $node->content : '';
  }

}
