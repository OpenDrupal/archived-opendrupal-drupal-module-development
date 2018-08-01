<?php

namespace Drupal\od_crawler\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * Defines the Endpoint entity.
 *
 * @ConfigEntityType(
 *   id = "endpoint",
 *   label = @Translation("Crawler endpoint"),
 *   handlers = {
 *     "list_builder" = "Drupal\od_crawler\EndpointListBuilder",
 *     "form" = {
 *       "add" = "Drupal\od_crawler\Form\EndpointForm",
 *       "edit" = "Drupal\od_crawler\Form\EndpointForm",
 *       "delete" = "Drupal\od_crawler\Form\EndpointDeleteForm"
 *     }
 *   },
 *   config_prefix = "endpoint",
 *   admin_permission = "administer open drupal crawler endpoint",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "add-form" = "/admin/config/services/od_crawler/add",
 *     "edit-form" = "/admin/config/services/od_crawler/{endpoint}",
 *     "delete-form" = "/admin/config/services/od_crawler/{endpoint}/delete",
 *     "collection" = "/admin/config/services/od_crawler"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "endpoint_url",
 *     "processors"
 *   }
 * )
 */
class Endpoint extends ConfigEntityBase implements EndpointInterface {

  use StringTranslationTrait;

  /**
   * The Crawler endpoint ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Crawler endpoint label.
   *
   * @var string
   */
  protected $label;

  /**
   * The Crawler endpoint URL.
   *
   * @var string
   */
  protected $endpoint_url;

  /**
   * Data processors.
   *
   * @var array
   */
  protected $processors = [];

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return $this->endpoint_url;
  }

  /**
   * {@inheritdoc}
   */
  public function getAllProcessors() {
    $options = [];

    $processors = \Drupal::getContainer()->get('plugin.manager.html_processor')->getDefinitions();

    foreach ($processors as $processor => $definition) {
      $options[$processor] = $definition['label']->render();
    }
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function getConfiguredProcessors() {
    return array_filter($this->processors);
  }

}
