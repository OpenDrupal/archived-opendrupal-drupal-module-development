<?php

/**
 * @file
 * Contains \Drupal\od_pegi\Plugin\Block\NewGames.
 */

namespace Drupal\opendrupal_pegi\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a recent games block.
 *
 * @Block(
 *   id = ...
 * )
 */
class NewGames extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $items = [];

    $build = [
      '#theme' => 'item_list',
      '#items' => $items,
    ];

    return $build;
  }

}
