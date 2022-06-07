<?php

namespace Drupal\od_crawler;

use Drupal\Component\Plugin\PluginInspectionInterface;
use simplehtmldom\HtmlDocument;

/**
 * Defines an interface for HTML Processor plugins.
 */
interface HtmlProcessorInterface extends PluginInspectionInterface {

  /**
   * Returns the id of the processor.
   *
   * @return string
   *   The machine readable name.
   */
  public function getId();

  /**
   * Returns the name of the processor.
   *
   * @return string
   *   The processor name.
   */
  public function getName();

  /**
   * Sets the DOM object for further processing.
   *
   * @param \simplehtmldom\HtmlDocument $dom
   *   The DOM object.
   *
   * @return \simplehtmldom\HtmlDocument
   *   The stored DOM object.
   */
  public function setDom(HtmlDocument $dom);

  /**
   * Performs data processing.
   *
   * @return string
   *   Result of the processing.
   */
  public function process();

}
