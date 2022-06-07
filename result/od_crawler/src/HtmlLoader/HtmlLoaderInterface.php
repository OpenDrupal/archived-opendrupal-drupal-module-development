<?php

namespace Drupal\od_crawler\HtmlLoader;

use simplehtmldom\HtmlDocument;

/**
 * HTML Loader interface.
 */
interface HtmlLoaderInterface {

  /**
   * Fetches the HTML DOM of a web page.
   *
   * @param string $url
   *   URL of the web page.
   *
   * @return HtmlDocument
   *   DOM node object containing the web page content.
   *
   * @throws \Exception
   *   When the operation failed.
   */
  public function loadDom($url);

}
