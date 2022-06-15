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

  /**
   * Constructs this loader class.
   *
   * @param \GuzzleHttp\ClientInterface $http_client
   *   A Guzzle client object.
   */
  public function __construct(ClientInterface $http_client) {
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   *
   * @throws \LogicException
   *   When the handler does not populate a response.
   * @throws \GuzzleHttp\Exception\RequestException
   *   When an error is encountered.
   */
  public function loadDom($url): HtmlDocument {

    $html = $this->loadHtml($url);
    if (empty($html)) {
      throw new \LogicException('No HTML data found.');
    }

    // Return the HTML as SimpleHtmlDom object.
    $dom = new HtmlDocument($html);
    return $dom;
  }

  /**
   * Loads HTML data from and endpoint.
   *
   * @param string $url
   *   URL of the web page.
   *
   * @return string
   *   The html response. Empty if a failure occurred.
   */
  private function loadHtml($url): string {

    /** @var \Psr\Http\Message\ResponseInterface $response **/
    $response = $this->httpClient->get($url);
    if ($response->getStatusCode() >= 400) {
      return '';
    }

    return $response->getBody()->getContents();
  }

}
