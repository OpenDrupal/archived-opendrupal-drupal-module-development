<?php

namespace Drupal\od_crawler\Plugin\HtmlProcessor;

use Drupal\od_crawler\HtmlProcessorBase;

/**
 * Provides an HTML H1 tag processor.
 *
 * @HtmlProcessor(
 *   id = "html_h1",
 *   label = @Translation("H1 title"),
 * )
 */
class HtmlH1Processor extends HtmlProcessorBase {

  /**
   * Returns the content of the h1 tag.
   *
   * @return string
   *   The h1 tag. Empty string if not found.
   */
  public function process() {
    $node = $this->domObject->find('h1', 0);
    return isset($node) ? $node->plaintext : '';
  }

}
