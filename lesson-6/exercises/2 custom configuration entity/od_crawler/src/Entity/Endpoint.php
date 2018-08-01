<?php

namespace Drupal\od_crawler\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * Defines the Crawler endpoint entity.
 *
 * @ConfigEntityType(
 *   id = "endpoint",
 *   label = @Translation("Crawler endpoint"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\od_crawler\EndpointListBuilder",
 *     "form" = {
 *       "add" = "Drupal\od_crawler\Form\EndpointForm",
 *       "edit" = "Drupal\od_crawler\Form\EndpointForm",
 *       "delete" = "Drupal\od_crawler\Form\EndpointDeleteForm"
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\od_crawler\EndpointHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "endpoint",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/services/endpoint/{endpoint}",
 *     "add-form" = "/admin/config/services/endpoint/add",
 *     "edit-form" = "/admin/config/services/endpoint/{endpoint}/edit",
 *     "delete-form" = "/admin/config/services/endpoint/{endpoint}/delete",
 *     "collection" = "/admin/config/services/endpoint"
 *   }
 * )
 */
class Endpoint extends ConfigEntityBase implements EndpointInterface {

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

}
