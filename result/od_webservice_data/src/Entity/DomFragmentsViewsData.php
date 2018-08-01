<?php

namespace Drupal\od_webservice\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides the views data for the DomFragments entity type.
 */
class DomFragmentsViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['dom_fragments']['table']['base'] = array(
      'field' => 'id',
      'title' => t('DomFragments'),
      'help' => t('The dom_fragments entity ID.'),
    );

    return $data;
  }

}
