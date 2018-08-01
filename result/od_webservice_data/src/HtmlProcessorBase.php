<?php

namespace Drupal\od_webservice;

use Drupal\Component\Plugin\PluginBase;
use SimpleHtmlDom\simple_html_dom;

/**
 * Base class for HTML Processor plugins.
 */
abstract class HtmlProcessorBase extends PluginBase implements HtmlProcessorInterface {

  /**
   * SimpleHtmlDom object containing the information to be processed.
   *
   * @var simple_html_dom
   */
  protected $DOMObject;

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->pluginDefinition['id'];
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->pluginDefinition['label'];
  }

  /**
   * {@inheritdoc}
   */
  public function setDom($dom) {

    $this->DOMObject = $dom;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  abstract public function process();

}
