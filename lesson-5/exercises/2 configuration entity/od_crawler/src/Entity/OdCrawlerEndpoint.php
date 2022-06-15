<?php

namespace Drupal\od_crawler\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\od_crawler\OdCrawlerEndpointInterface;

/**
 * Defines the endpoint entity type.
 *
 * @ConfigEntityType(
 *   id = "od_crawler_endpoint",
 *   label = @Translation("Endpoint"),
 *   label_collection = @Translation("Endpoints"),
 *   label_singular = @Translation("endpoint"),
 *   label_plural = @Translation("endpoints"),
 *   label_count = @PluralTranslation(
 *     singular = "@count endpoint",
 *     plural = "@count endpoints",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\od_crawler\OdCrawlerEndpointListBuilder",
 *     "form" = {
 *       "add" = "Drupal\od_crawler\Form\OdCrawlerEndpointForm",
 *       "edit" = "Drupal\od_crawler\Form\OdCrawlerEndpointForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   },
 *   config_prefix = "od_crawler_endpoint",
 *   admin_permission = "administer od_crawler_endpoint",
 *   links = {
 *     "collection" = "/admin/structure/od-crawler-endpoint",
 *     "add-form" = "/admin/structure/od-crawler-endpoint/add",
 *     "edit-form" = "/admin/structure/od-crawler-endpoint/{od_crawler_endpoint}",
 *     "delete-form" = "/admin/structure/od-crawler-endpoint/{od_crawler_endpoint}/delete"
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description"
 *   }
 * )
 */
class OdCrawlerEndpoint extends ConfigEntityBase implements OdCrawlerEndpointInterface {

  /**
   * The endpoint ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The endpoint label.
   *
   * @var string
   */
  protected $label;

  /**
   * The endpoint status.
   *
   * @var bool
   */
  protected $status;

  /**
   * The od_crawler_endpoint description.
   *
   * @var string
   */
  protected $description;

}
