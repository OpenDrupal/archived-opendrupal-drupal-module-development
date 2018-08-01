<?php

namespace Drupal\od_webservice\Entity\Controller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Url;

/**
 * Provides a list controller for DomFragments entity.
 *
 * @ingroup od_webservice
 */
class DomFragmentsListController extends EntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = t('DomFragmentsID');
    $header['name'] = t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\od_webservice\Entity\DomFragments */
    $row['id'] = $entity->id();
    $row['name'] = \Drupal::l(
      $this->getLabel($entity),
      new Url(
        'entity.dom_fragments.edit_form', array(
          'dom_fragments' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
