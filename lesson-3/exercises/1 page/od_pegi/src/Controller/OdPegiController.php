<?php

/**
 * @file
 * Contains \Drupal\od_pegi\Controller\OdPegiController.
 */

namespace Drupal\od_pegi\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for OpenDrupal Pegi module routes.
 */
class OdPegiController extends ControllerBase {

  /**
   * Content controller callback: View games overview page.
   *
   * @return array
   *   Render array of page output.
   */
  public function gamesOverview() {

    $items = [];

    $build['games'] = array(
      '#theme' => 'item_list',
      '#items' => $items,
    );

    return $build;
  }

}
