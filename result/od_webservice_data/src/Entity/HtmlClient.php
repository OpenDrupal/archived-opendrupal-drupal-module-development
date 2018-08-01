<?php

namespace Drupal\od_webservice\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\od_webservice\HtmlClientInterface;

/**
 * Defines the HtmlClient entity.
 *
 * @ConfigEntityType(
 *   id = "html_client",
 *   label = @Translation("HTML webservice client"),
 *   handlers = {
 *     "list_builder" = "Drupal\od_webservice\Controller\HtmlClientListBuilder",
 *     "form" = {
 *       "add" = "Drupal\od_webservice\Form\HtmlClientForm",
 *       "edit" = "Drupal\od_webservice\Form\HtmlClientForm",
 *       "delete" = "Drupal\od_webservice\Form\HtmlClientDeleteForm"
 *     }
 *   },
 *   config_prefix = "html_client",
 *   admin_permission = "administer open drupal webservice",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "edit-form" = "/admin/config/services/od_webservice/{html_client}",
 *     "delete-form" = "/admin/config/services/od_webservice/{html_client}/delete",
 *     "collection" = "/admin/config/services/od_webservice"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "endpoint_url",
 *     "processors"
 *   }
 * )
 */
class HtmlClient extends ConfigEntityBase implements HtmlClientInterface {

  use StringTranslationTrait;

  /**
   * The HTML Client ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The HTML Client label.
   *
   * @var string
   */
  protected $label;

  /**
   * The endpoint URL.
   *
   * @var string
   */
  protected $endpoint_url;

  /**
   * Data processors.
   *
   * @var array
   */
  protected $processors = array();

  /**
   * {@inheritdoc}
   */
  public function getEndpointUrl() {
    return $this->endpoint_url;
  }


  /**
   * {@inheritdoc}
   */
  public function getAllProcessors() {
    $options = array();

    $processors = \Drupal::getContainer()->get('plugin.manager.html_processor')->getDefinitions();

    foreach ($processors as $processor => $definition) {
      $options[$processor] = $definition['label']->render();
    }
    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function getProcessors() {
    return array_filter($this->processors);
  }

}
