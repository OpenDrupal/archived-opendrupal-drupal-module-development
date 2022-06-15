<?php

namespace Drupal\od_crawler\Controller;

use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\od_crawler\HtmlLoader;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class DisplayController.
 *
 * @package Drupal\od_crawler\Controller
 */
class DisplayController extends ControllerBase {

  /**
   * HTML Loader.
   *
   * @var \Drupal\od_crawler\HtmlLoader
   */
  protected $htmlLoader;

  /**
   * HTML processor plugin manager.
   *
   * @var \Drupal\od_crawler\HtmlProcessorBase
   */
  protected $htmlProcessorPluginManager;

  /**
   * Constructs a new DisplayController instance.
   *
   * @param \Drupal\od_crawler\HtmlLoader $html_loader
   *   The HTML crawler.
   * @param \Drupal\Component\Plugin\PluginManagerInterface $html_processor_plugin_manager
   *   The HTML Processor plugin manager.
   */
  public function __construct(HtmlLoader $html_loader, PluginManagerInterface $html_processor_plugin_manager) {
    $this->htmlLoader = $html_loader;
    $this->htmlProcessorPluginManager = $html_processor_plugin_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('od_crawler.html_loader'),
      $container->get('plugin.manager.html_processor')
    );
  }

  /**
   * Page controller: Displays data received via the crawler.
   *
   * @return array
   *   Render array page output.
   */
  public function receivedData() {

    $items = [];

    /** @var \Drupal\od_crawler\Entity\Endpoint[] $entities */
    $entities = $this->entityTypeManager()->getStorage('endpoint')->loadMultiple();
    foreach ($entities as $entity) {

      // Load HTML data from the endpoint.
      try {
        $dom = $this->htmlLoader->loadDom($entity->getUrl());
      }
      catch (\Exception $e) {
        watchdog_exception('od_crawler', $e);
        $this->messenger()->addMessage($this->t('Failed to find data at %name.', ['%name' => $entity->label()]), 'error');
        break;
      }

      // Execute processor plugins on the HTML data.
      foreach ($entity->getConfiguredProcessors() as $plugin_id) {

        // Load and execute HTML processor plugin.
        /** @var \Drupal\od_crawler\HtmlProcessorInterface $processor */
        $processor = $this->htmlProcessorPluginManager->createInstance($plugin_id);
        $result = $processor->setDom($dom)->process();
        if ($result) {
          $items[] = $this->t('@label of %name: @result', [
            '@label' => $processor->getName(),
            '%name' => $entity->label(),
            '@result' => $result,
          ]);
        }
        else {
          $items[] = $this->t('No @label found for %name', [
            '@label' => $processor->getName(),
            '%name' => $entity->label(),
          ]);
        }
      }
    }

    return [
      '#theme' => 'item_list',
      '#items' => $items,
    ];
  }

}
