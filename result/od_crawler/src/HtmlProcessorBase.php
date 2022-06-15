<?php

namespace Drupal\od_crawler;

use Drupal\Component\Plugin\PluginBase;
use simplehtmldom\HtmlDocument;

/**
 * Base class for HTML Processor plugins.
 */
abstract class HtmlProcessorBase extends PluginBase implements HtmlProcessorInterface {

  /**
   * SimpleHtmlDom object containing the information to be processed.
   *
   * @var \simplehtmldom\HtmlDocument
   */
  protected $domObject;

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
  public function setDom(HtmlDocument $dom) {

    $this->domObject = $dom;
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  abstract public function process();

}
