<?php

namespace Drupal\od_crawler;

use GuzzleHttp\ClientInterface;
use simplehtmldom\HtmlDocument;

/**
 * Fetches HTML data from remote locations.
 */
class HtmlLoader implements HtmlLoaderInterface {

  /**
   * The HTTP client to fetch the HTML data with.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  // see exercises.txt

}
